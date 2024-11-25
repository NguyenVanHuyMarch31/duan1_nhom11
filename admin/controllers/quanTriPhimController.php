<?php

class quanTriPhimController
{
    public $modelMovies;
    public $modelGenreMovies;

    public function __construct()
    {
        $this->modelMovies = new quanTriPhimModel();
        $this->modelGenreMovies = new quanTriLoaiPhimModel();
    }

    public function quanTriPhim()
    {
        // Lấy danh sách phim từ model
        $listMovies = $this->modelMovies->getMovies();
        // var_dump($listMovies);die();
        require_once './views/quanLiPhim/adminQuanLiPhim.php';
    }


    public function themPhim()
    {
        $listGenreMovies = $this->modelGenreMovies->listGenreMovies();
        // var_dump($listGenreMovies);die();
        require_once './views/quanLiPhim/themPhim.php';
    }


    public function postPhim()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $movie_name = $_POST['movie_name'];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $release_date = $_POST['release_date'];
            $trailer = $_POST['trailer'];
            $genre_ids = $_POST['genre_id'] ?? [];

            $error = [];
            if (empty($movie_name)) {
                $error['movie_name'] = 'Tên phim không được để trống';
            }
            if (empty($duration)) {
                $error['duration'] = 'Thời lượng phim không được để trống';
            }
            if (empty($director)) {
                $error['director'] = 'Đạo diễn phim không được để trống';
            }
            if (empty($actors)) {
                $error['actors'] = 'Diễn viên phim không được để trống';
            }
            if (empty($release_date)) {
                $error['release_date'] = 'Ngày phát hành phim không được để trống';
            }
            if (empty($trailer)) {
                $error['trailer'] = 'Link trailer phim không được để trống';
            }

            $poster = $_FILES['poster'];
            $file_poster = null;
            if ($poster && $poster['error'] == UPLOAD_ERR_OK) {
                $file_poster = uploadFile($poster, './uploads/');
                if (!$file_poster) {
                    $error['poster'] = 'Upload ảnh poster không thành công';
                }
            } else {
                $error['poster'] = "Hình ảnh không đúng định dạng hoặc quá lớn.";
            }

            if (empty($error)) {
                $movie_id = $this->modelMovies->addMovie($movie_name, $duration, $description, $director, $actors, $release_date, $trailer, $file_poster);

                if ($movie_id) {
                    foreach ($genre_ids as $genre_id) {
                        if ($genre_id) {
                            $this->modelMovies->addMovieGenre($movie_id, $genre_id);
                        } else {
                            error_log("Thể loại không hợp lệ: $genre_id");
                        }
                    }

                    header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
                    exit();
                } else {
                    echo "Thêm phim thất bại";
                }
            }

            $_SESSION['error'] = $error;
            header('Location: ' . BASE_URL_ADMIN . '?act=themPhim');
            exit();
        }
    }
    public function suaPhim()
    {
        $movie_id = $_GET['movie_id'];
        if ($movie_id) {
            $movie = $this->modelMovies->getMovieById($movie_id);
            $listGenreMovies = $this->modelGenreMovies->listGenreMovies();
            $selectedGenres = $this->modelMovies->getGenresByMovieId($movie_id);

            if ($movie) {
                require_once './views/quanLiPhim/suaPhim.php';
            } else {
                header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
                exit();
            }
        }
    }



    public function editPhim()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $movie_id = $_POST['movie_id'];
            $movie_name = $_POST['movie_name'];
            $genre_ids = isset($_POST['genre_id']) ? $_POST['genre_id'] : [];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $director = $_POST['director'];
            $actors = $_POST['actors'];
            $release_date = $_POST['release_date'];
            $trailer = $_POST['trailer'];

            $errors = [];

            // Kiểm tra lỗi đầu vào
            if (empty($movie_name)) {
                $errors['movie_name'] = "Tên phim không được để trống.";
            }
            if (empty($duration)) {
                $errors['duration'] = "Thời lượng không được để trống.";
            }
            if (empty($director)) {
                $errors['director'] = 'Đạo diễn phim không được để trống';
            }
            if (empty($actors)) {
                $errors['actors'] = 'Diễn viên phim không được để trống';
            }
            if (empty($release_date)) {
                $errors['release_date'] = 'Ngày phát hành phim không được để trống';
            }
            if (empty($trailer)) {
                $errors['trailer'] = 'Link trailer phim không được để trống';
            }

            // Kiểm tra phim có tồn tại
            $existingMovie = $this->modelMovies->getMovieById($movie_id);
            if (!$existingMovie) {
                header("Location: " . BASE_URL_ADMIN . '?act=quanTriPhim');
                exit();
            }

            $file_old = $existingMovie['poster'] ?? null;
            $file_new = $file_old;

            // Kiểm tra và upload poster mới
            if (isset($_FILES['poster']) && $_FILES['poster']['error'] == UPLOAD_ERR_OK) {
                $poster = $_FILES['poster'];

                $new_file = uploadFile($poster, './uploads/');
                if ($new_file) {
                    $file_new = $new_file;
                    // Xóa ảnh cũ nếu có
                    if ($file_old) {
                        deleteFile($file_old);
                    }
                } else {
                    $errors['poster'] = 'Có lỗi khi tải lên ảnh mới.';
                }
            }

            // Nếu không có lỗi
            if (empty($errors)) {
                // Cập nhật thông tin phim
                $updated = $this->modelMovies->updateMovie($movie_id, $movie_name, $duration, $description, $director, $actors, $release_date, $trailer, $file_new);

                // Cập nhật thể loại phim
                if (!empty($genre_ids)) {
                    $this->modelMovies->updateMovieGenres($movie_id, $genre_ids);
                }

                // Nếu cập nhật thành công
                if ($updated) {
                    header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
                    exit();
                } else {
                    $errors['update'] = "Có lỗi khi cập nhật phim.";
                }
            }

            $_SESSION['error'] = $errors;
            header('Location: ' . BASE_URL_ADMIN . '?act=suaPhim&movie_id=' . $movie_id);
            exit();
        }
    }



    public function deletePhim()
    {
        $movie_id = $_GET['movie_id'];
        $movies = $this->modelMovies->deleteMovie($movie_id);
        header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
        exit();
    }

    public function chiTietPhim()
    {
        $movie_id = $_GET['movie_id'];
        if ($movie_id) {
            $movie = $this->modelMovies->getMovieById($movie_id);

            if ($movie) {
                $movie_genres = $this->modelMovies->getMovieGenres($movie_id);

                require_once './views/quanLiPhim/chiTietPhim.php';
            } else {
                $_SESSION['error'] = "Phim không tồn tại.";
                header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
                exit();
            }
        } else {
            $_SESSION['error'] = "Không có ID phim được cung cấp.";
            header('Location: ' . BASE_URL_ADMIN . '?act=quanTriPhim');
            exit();
        }
    }
}
