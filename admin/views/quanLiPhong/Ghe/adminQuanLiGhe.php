<?php
require './views/layout/header.php';
require './views/layout/sidebar.php';

// Sắp xếp ghế theo tên
usort($seats, function ($a, $b) {
    return strcmp($a['seat_name'], $b['seat_name']);
});
?>
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require './views/layout/navbar.php'; ?>
    <div class="content">
        <div class="animated fadeIn">
            <h3 style="text-align: center;">Quản lý ghế </h3>

            <form action="<?= BASE_URL_ADMIN . '?act=changeSeatStatus'; ?>" method="POST">
                <div class="seat-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(100px, 1fr)); gap: 10px;">
                    <?php foreach ($seats as $seat): ?>
                        <?php
                        $seatColorClass = '';
                        // $seatIcon = '';

                        // switch ($seat['status']) {
                        //     case 'Bảo trì':
                        //         $seatColorClass = 'maintain';
                        //         $seatIcon = '🛠';
                        //         break;
                        //     case 'Được chọn':
                        //         $seatColorClass = 'selected'; 
                        //         $seatIcon = '✔️'; 
                        //         break;
                        //     case 'Không được chọn':
                        //         $seatColorClass = 'not-selected'; 
                        //         $seatIcon = '❌'; 
                        //         break;
                        // }

                        switch ($seat['seat_type_id']) {
                            case 1:
                                if (empty($seatColorClass)) {
                                    $seatColorClass = 'gray'; // Ghế thường
                                }
                                break;
                            case 2:
                                if (empty($seatColorClass)) {
                                    $seatColorClass = 'green'; // Ghế VIP
                                }
                                break;
                            case 3:
                                if (empty($seatColorClass)) {
                                    $seatColorClass = 'gold'; // Ghế Premium
                                }
                                break;
                        }
                        ?>

                        <div
                            class="seat <?= $seatColorClass ?>"
                            id="seat-<?= $seat['id_seat'] ?>"
                            style="padding: 10px; text-align: center; border: 1px solid #ccc; cursor: pointer;">

                            <label for="" style="cursor: pointer;">
                                <?= $seat['seat_name'] ?>
                            </label>

                            <div class="seat-info-popup" id="popup-seat-<?= $seat['id_seat'] ?>" style="margin-top: 10px; padding: 5px; border: 1px solid #000; background-color: #f9f9f9;">
                                <p>Loại ghế: <strong><?= $seat['seat_type_name'] ?>-<?= $seat['seat_name']  ?> : <?= $seat['room_name']  ?></strong></p>
                                <p>Giá vé: <?= number_format($seat['price'], 0, ',', '.') ?> VND</p>
                                <p>Mô tả: <?= $seat['description'] ?></p>
                                <form action="<?= BASE_URL_ADMIN . '?act=changeSeatStatus'; ?>" method="POST">
                                    <label for="seat_status">Chọn trạng thái ghế:</label>
                                    <select name="seat_status" id="seat_status">
                                        <option value="Ghế trống" <?= $seat['status'] == 'Ghế trống' ? 'selected' : '' ?>>Ghế trống
                                        </option>
                                        <option value="Ghế đã chọn" <?= $seat['status'] == 'Ghế đã chọn' ? 'selected' : '' ?>>Ghế đã chọn</option>
                                        <option value="Đã đặt" <?= $seat['status'] == 'Đã đặt' ? 'selected' : '' ?>>Ghế đã đặt</option>
                                    </select>
                                    <button type="submit" name="change_status" value="<?= $seat['id_seat'] ?>"> Trạng thái</button>
                                </form>


                                <form action="<?php echo BASE_URL_ADMIN . '?act=changeSeatType'; ?>" method="POST">
                                    <label for="new_seat_type">Chọn loại ghế mới:</label>
                                    <select name="new_seat_type" id="new_seat_type">
                                        <option value="1" <?= $seat['seat_type_id'] == 1 ? 'selected' : '' ?>>Ghế Thường</option>
                                        <option value="2" <?= $seat['seat_type_id'] == 2 ? 'selected' : '' ?>>Ghế VIP</option>
                                        <option value="3" <?= $seat['seat_type_id'] == 3 ? 'selected' : '' ?>>Ghế Premium</option>
                                    </select>
                                    <button type="submit" name="change_seat" value="<?= $seat['id_seat'] ?>"> Loại ghế</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </form>
        </div>
    </div>

    <div class="clearfix"></div>
    <?php require './views/layout/footer.php'; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const seats = document.querySelectorAll('.seat');
        const overlay = document.createElement('div');
        overlay.classList.add('overlay');
        overlay.style.position = 'fixed';
        overlay.style.top = 0;
        overlay.style.left = 0;
        overlay.style.width = '100%';
        overlay.style.height = '100%';
        overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.5)';
        overlay.style.display = 'none';
        document.body.appendChild(overlay);

        seats.forEach(seat => {
            seat.addEventListener('click', () => {
                const popupId = `popup-seat-${seat.id.split('-')[1]}`;
                const popup = document.getElementById(popupId);

                if (popup) {
                    popup.style.display = 'block';
                    popup.style.position = 'absolute';
                    popup.style.top = `${seat.offsetTop + 40}px`;
                    popup.style.left = `${seat.offsetLeft + 20}px`;
                    overlay.style.display = 'block';
                }
            });
        });

        overlay.addEventListener('click', () => {
            document.querySelectorAll('.seat-info-popup').forEach(popup => popup.style.display = 'none');
            overlay.style.display = 'none';
        });
    });
</script>