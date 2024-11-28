<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const rowsPerPage = 5; // Số lượng phim mỗi trang
    const table = document.querySelector("#moviesTable");
    const rows = table ? table.querySelectorAll(".movieRow") : [];
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    const pagination = document.querySelector(".paginationNav ul");
    let currentPage = parseInt(localStorage.getItem("currentPage")) || 1; // Lấy trang từ localStorage hoặc mặc định là trang 1

    // Hiển thị các hàng của trang hiện tại
    function showPage(page) {
        const start = (page - 1) * rowsPerPage;
        const end = page * rowsPerPage;

        rows.forEach((row, index) => {
            row.style.display = index >= start && index < end ? "" : "none";
        });
    }

    // Tạo các nút phân trang
    function createPagination() {
        pagination.innerHTML = "";

        // Nút Trước
        const prev = document.createElement("li");
        prev.classList.add("page-item");
        if (currentPage === 1) prev.classList.add("disabled"); // Vô hiệu hóa nếu là trang đầu tiên
        prev.innerHTML = `<a class="page-link" href="#">Trước</a>`;
        prev.addEventListener("click", function () {
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
            }
        });
        pagination.appendChild(prev);

        // Các nút trang
        for (let i = 1; i <= totalPages; i++) {
            const page = document.createElement("li");
            page.classList.add("page-item");
            if (i === currentPage) page.classList.add("active");
            page.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            page.addEventListener("click", function () {
                currentPage = i;
                updatePagination();
            });
            pagination.appendChild(page);
        }

        // Nút Tiếp
        const next = document.createElement("li");
        next.classList.add("page-item");
        if (currentPage === totalPages) next.classList.add("disabled"); // Vô hiệu hóa nếu là trang cuối
        next.innerHTML = `<a class="page-link" href="#">Tiếp</a>`;
        next.addEventListener("click", function () {
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
            }
        });
        pagination.appendChild(next);
    }

    // Cập nhật phân trang và lưu trạng thái
    function updatePagination() {
        showPage(currentPage);
        createPagination();
        localStorage.setItem("currentPage", currentPage); // Lưu trang hiện tại vào localStorage
    }

    // Nếu không có dữ liệu, ẩn phần phân trang
    if (totalRows === 0) {
        pagination.style.display = "none";
    } else {
        updatePagination(); // Khởi tạo phân trang
    }
});

</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const itemsPerPage = 5; // Số hàng mỗi trang
        const rows = document.querySelectorAll("#showtimesTable .showtimeRow"); // Lấy tất cả các hàng
        const totalItems = rows.length; // Tổng số hàng
        const totalPages = Math.ceil(totalItems / itemsPerPage); // Tổng số trang

        const paginationNav = document.getElementById("paginationNav").querySelector("ul");

        // Hàm hiển thị các hàng cho mỗi trang
        function showPage(page) {
            const startIndex = (page - 1) * itemsPerPage;
            const endIndex = page * itemsPerPage;

            // Ẩn tất cả các hàng
            rows.forEach(row => row.style.display = "none");

            // Hiển thị các hàng trong phạm vi trang hiện tại
            for (let i = startIndex; i < endIndex && i < totalItems; i++) {
                rows[i].style.display = "";
            }
        }

        // Hàm tạo các nút phân trang
        function createPagination() {
            // Xóa các nút phân trang cũ
            paginationNav.innerHTML = "";

            // Tạo nút "Trước"
            const prevButton = document.createElement("li");
            prevButton.classList.add("page-item");
            prevButton.innerHTML = `<a class="page-link" href="#">Trước</a>`;
            prevButton.addEventListener("click", () => changePage(currentPage - 1));
            paginationNav.appendChild(prevButton);

            // Tạo các nút trang
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement("li");
                pageButton.classList.add("page-item");
                if (i === currentPage) {
                    pageButton.classList.add("active");
                }
                pageButton.innerHTML = `<a class="page-link" href="#">${i}</a>`;
                pageButton.addEventListener("click", () => changePage(i));
                paginationNav.appendChild(pageButton);
            }

            // Tạo nút "Tiếp"
            const nextButton = document.createElement("li");
            nextButton.classList.add("page-item");
            nextButton.innerHTML = `<a class="page-link" href="#">Tiếp</a>`;
            nextButton.addEventListener("click", () => changePage(currentPage + 1));
            paginationNav.appendChild(nextButton);
        }

        let currentPage = 1; // Trang hiện tại

        // Hàm thay đổi trang
        function changePage(page) {
            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;

            currentPage = page;
            showPage(currentPage);
            createPagination();
        }

        // Khởi tạo phân trang khi tải trang
        changePage(currentPage);
    });
</script>


<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-md-6 offset-md-6 col-sm-6">
                <h4>BEEFILMHUB</h4>
                <p>Cổng thông tin giải trí phim và trải nghiệm điện ảnh tốt nhất.</p>
           
                <p>&copy; 2024 BEEFILMHUB</p>
                <p>Thiết kế bởi <a href="https://yourwebsite.com">Nhóm 11 - BFH</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- /.site-footer -->
</div>
<!-- /#right-panel -->
</body>

</html>