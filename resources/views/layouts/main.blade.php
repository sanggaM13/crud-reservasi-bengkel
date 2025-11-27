<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        html, body { 
            height: 100%; 
            margin: 0; 
            padding: 0; 
        }
        
        body { 
            display: flex; 
            flex-direction: column; 
            min-height: 100vh; 
        }

        /* Main fleksibel */
        main.flex-fill {
            flex: 1;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            padding: 20px 0;
        }

        /* Video background fixed fullscreen */
        #videoBackground {
            position: fixed;
            top: 0; 
            left: 0;
            width: 100vw; 
            height: 100vh;
            z-index: -1;
            overflow: hidden;
        }

        #videoBackground video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Card Dashboard */
        .card-dashboard {
            backdrop-filter: blur(10px);
            background-color: rgba(255,255,255,0.85);
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            min-height: 220px;
            display: flex;
 

 
            margin: 0.5rem;
            width: 100%;
            max-width: 300px;
            border: none;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
                height: 250px;            /* Tinggi card dibuat sama */
    border-radius: 20px;      /* Agar bentuknya seragam */
    display: flex;
    flex-direction: column;
    justify-content: center;  /* Tengah vertikal */
        }

        .card-dashboard:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 15px 30px rgba(0,0,0,0.25);
        }

        .card-dashboard h4 { 
            font-size: 1.1rem; 
            font-weight: 600;
            color: #333;
            margin-bottom: 15px;
        }
.card-dashboard .card-body {
    flex: 1;
}

        .card-dashboard h2 { 
            font-weight: 700; 
            color: #2c3e50;
            margin: 10px 0;
                font-size: 40px;
    font-weight: bold;
        }

        .card-dashboard p { 
            font-size: 0.9rem; 
            color: #666;
            margin-bottom: 15px;
        }

        footer { 
            margin-top: auto; 
            z-index: 1000;
            position: relative;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0; 
            left: 0;
            width: 100%; 
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 1050;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .overlay-content {
            background: #fff;
            padding: 25px;
            width: 95%;
            max-width: 1200px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.4);
            max-height: 85vh;
            overflow-y: auto;
        }

        .blur-bg { 
            filter: blur(5px); 
            pointer-events: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-dashboard {
                max-width: 100%;
                min-height: 180px;
            }
            
            .card-dashboard h2 {
                font-size: 2.2rem;
            }
            
            .overlay-content {
                padding: 15px;
                width: 98%;
            }
        }

        /* Table styling */
        .table-container {
            max-height: 400px;
            overflow-y: auto;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-motorcycle me-2"></i>Bengkel Motor
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('pelanggan.index') }}">Pelanggan</a>
                <a class="nav-link" href="{{ route('mekanik.index') }}">Mekanik</a>
                <a class="nav-link" href="{{ route('reservasi.index') }}">Reservasi</a>
            </div>
        </div>
    </nav>

    <!-- Video Background -->
    <div id="videoBackground">
        <video autoplay muted loop playsinline id="bgVideo">
            <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Main Content -->
    <main class="flex-fill position-relative">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            &copy; {{ date('Y') }} Bengkel Motor. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    @stack('scripts')

    <script>
        // Ganti video setiap 12 detik
        const videos = [
            "{{ asset('videos/video1.mp4') }}",
            "{{ asset('videos/video2.mp4') }}",
            "{{ asset('videos/video3.mp4') }}"
        ];
        
        let currentVideoIndex = 0;
        
        function changeVideo() {
            currentVideoIndex = (currentVideoIndex + 1) % videos.length;
            const videoElement = document.getElementById('bgVideo');
            videoElement.src = videos[currentVideoIndex];
            videoElement.load();
        }
        
        // Change video every 12 seconds
        setInterval(changeVideo, 12000);
        
        // Handle video error
        document.getElementById('bgVideo').addEventListener('error', function() {
            console.log('Video loading error, trying next video...');
            changeVideo();
        });
    </script>

</body>
</html>