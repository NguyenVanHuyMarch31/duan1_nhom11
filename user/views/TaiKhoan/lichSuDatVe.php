<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đặt vé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            margin: 30px;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #1a1a1a;
            padding: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }

        .sidebar h2 {
            color: #fff;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #b8b8b8;
            font-size: 18px;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a:hover {
            color: #fff;
            background-color: #ff2d2d;
            padding-left: 10px;
            transition: all 0.3s ease;
        }

        .sidebar ul li a.active {
            color: #fff;
            background-color: #ff2d2d;
        }

        .sidebar ul li a:before {
            content: "►";
            margin-right: 10px;
        }

        .content {
            flex-grow: 1;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header h1 {
            color: #333;
            font-size: 32px;
            font-weight: 600;
        }

        .history-container {
            width: 100%;
            max-width: 1030px;
            background: #ffffff;
            border-radius: 15px;
            padding: 25px 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .history-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .history-header h1 {
            font-size: 32px;
            font-weight: bold;
            color: #1e3c72;
            margin: 0;
        }

        .ticket-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            background: #f7f9fc;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 20px 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ticket-card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .ticket-info {
            flex: 1 1 calc(70% - 20px);
            margin-right: 20px;
        }

        .ticket-info h3 {
            font-size: 22px;
            margin: 0;
            color: #1e3c72;
            font-weight: bold;
        }

        .ticket-info p {
            margin: 8px 0;
            font-size: 14px;
            color: #555;
        }

        .qr-code {
            flex: 0 0 100px;
            width: 100px;
            height: 100px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
        }

        .qr-code img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-tickets {
            text-align: center;
            font-size: 18px;
            color: #999;
            margin-top: 30px;
        }

        @media (max-width: 600px) {
            .ticket-card {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .ticket-info {
                margin-right: 0;
                margin-bottom: 15px;
                flex: 1 1 100%;
            }

            .qr-code {
                margin: auto;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Sidebar (Menu) -->
        <div class="sidebar">
            <h2>TÀI KHOẢN BFH</h2>
            <?php require './views/layout/sidebar.php' ?>
        </div>

        <!-- Content Section -->
        <div class="content">
        <div class="history-container">
        <!-- Header -->
        <div class="history-header">
            <h1>Lịch sử vé xem phim</h1>
        </div>

        <!-- Ticket History -->
        <div id="ticket-list">
            <!-- Vé mẫu (sẽ được tạo động qua JavaScript) -->
        </div>

        <!-- No Tickets Message -->
        <div id="no-tickets" class="no-tickets" style="display: none;">
            Bạn chưa có vé nào trong lịch sử.
        </div>
    </div>

        </div>
    </div>
    
    <script>
        const tickets = [
            {
                movie: "Avatar 2",
                cinema: "CGV Vincom Hà Nội",
                time: "19:00 - Ngày 10/11/2024",
                seats: "A1, A2",
                payment: "MB Bank - 0986690271"
            },
            {
                movie: "Spiderman: No Way Home",
                cinema: "Lotte Cinema Hà Đông",
                time: "15:30 - Ngày 05/11/2024",
                seats: "B3, B4",
                payment: "MB Bank - 0986690271"
            },
        ];

        const ticketList = document.getElementById('ticket-list');
        const noTickets = document.getElementById('no-tickets');

        // Hiển thị vé
        if (tickets.length === 0) {
            noTickets.style.display = "block";
        } else {
            noTickets.style.display = "none";

            tickets.forEach(ticket => {
                const ticketCard = document.createElement('div');
                ticketCard.className = 'ticket-card';

                // Tạo thông tin QR Code động (bao gồm thông tin thanh toán và vé)
                const qrData = `Phim: ${ticket.movie}\nRạp: ${ticket.cinema}\nThời gian: ${ticket.time}\nGhế: ${ticket.seats}\nThanh toán: ${ticket.payment}`;
                const qrApiUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(qrData)}&size=100x100`;

                ticketCard.innerHTML = `
                    <div class="ticket-info">
                        <h3>${ticket.movie}</h3>
                        <p>Rạp: ${ticket.cinema}</p>
                        <p>Giờ chiếu: ${ticket.time}</p>
                        <p>Ghế: ${ticket.seats}</p>
                    </div>
                    <div class="qr-code">
                        <img src="${qrApiUrl}" alt="QR Code ${ticket.movie}">
                    </div>
                `;
                ticketList.appendChild(ticketCard);
            });
        }
    </script>
</body>

</html>
</body>

</html>
