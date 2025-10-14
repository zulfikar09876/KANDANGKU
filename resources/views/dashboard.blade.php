<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - KANDANGKU</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .header {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .header p {
            color: #6b7280;
            font-size: 1.125rem;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #6b7280;
            font-weight: 500;
        }
        
        .quick-actions {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .quick-actions h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }
        
        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .action-btn {
            background: linear-gradient(135deg, #10b981, #3b82f6);
            color: white;
            padding: 1rem;
            border-radius: 15px;
            text-decoration: none;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }
        
        .nav {
            background: white;
            border-radius: 20px;
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: #10b981;
            text-decoration: none;
        }
        
        .nav-links {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .nav-link {
            color: #6b7280;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: #10b981;
        }
        
        .logout-btn {
            background: #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }
        
        .logout-btn:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="nav">
        <a href="/" class="nav-logo">🐐 KANDANGKU</a>
        <div class="nav-links">
                        <a href="{{ route('goats.index') }}" class="nav-link">Kambing</a>
                        <a href="{{ route('kandangs.index') }}" class="nav-link">Kandang</a>
                        <a href="{{ route('feeds.index') }}" class="nav-link">Pakan</a>
                        <a href="{{ route('reproductions.index') }}" class="nav-link">Reproduksi</a>
                        <a href="{{ route('kids.index') }}" class="nav-link">Anak</a>
                        <a href="{{ route('healths.index') }}" class="nav-link">Kesehatan</a>
                        <a href="{{ route('fattenings.index') }}" class="nav-link">Penggemukan</a>
                        <a href="{{ route('record-logs.index') }}" class="nav-link">Pencatatan</a>
                        <a href="{{ route('marketings.index') }}" class="nav-link">Pemasaran</a>
                        <a href="{{ route('plannings.index') }}" class="nav-link">Perencanaan</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Dashboard KANDANGKU</h1>
            <p>Selamat datang, {{ Auth::user()->name }}! Kelola kandang kambing Anda dengan mudah.</p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #3b82f6); color: white;">
                    🐐
                </div>
                <div class="stat-number">{{ $counts['total_goats'] }}</div>
                <div class="stat-label">Total Kambing</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #f59e0b, #f97316); color: white;">
                    🤰
                </div>
                <div class="stat-number">{{ $counts['bunting'] }}</div>
                <div class="stat-label">Kambing Bunting</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #8b5cf6, #a855f7); color: white;">
                    👶
                </div>
                <div class="stat-number">{{ $counts['kids'] }}</div>
                <div class="stat-label">Anak Terdata</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #06b6d4, #0891b2); color: white;">
                    🏠
                </div>
                <div class="stat-number">{{ $counts['kandangs'] }}</div>
                <div class="stat-label">Kandang</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
                    💚
                </div>
                <div class="stat-number">{{ $counts['health_sehat'] }}</div>
                <div class="stat-label">Kambing Sehat</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white;">
                    🤒
                </div>
                <div class="stat-number">{{ $counts['health_sakit'] }}</div>
                <div class="stat-label">Kambing Sakit</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="actions-grid">
                            <a href="{{ route('goats.create') }}" class="action-btn">➕ Tambah Kambing</a>
                            <a href="{{ route('kandangs.create') }}" class="action-btn">🏠 Tambah Kandang</a>
                            <a href="{{ route('feeds.create') }}" class="action-btn">🌱 Tambah Pakan</a>
                            <a href="{{ route('reproductions.create') }}" class="action-btn">💕 Catat Reproduksi</a>
                            <a href="{{ route('kids.create') }}" class="action-btn">👶 Catat Anak</a>
                            <a href="{{ route('healths.create') }}" class="action-btn">🏥 Catat Kesehatan</a>
                            <a href="{{ route('fattenings.create') }}" class="action-btn">📈 Catat Penggemukan</a>
                            <a href="{{ route('record-logs.create') }}" class="action-btn">📝 Catat Umum</a>
                            <a href="{{ route('marketings.create') }}" class="action-btn">💰 Catat Pemasaran</a>
                            <a href="{{ route('plannings.create') }}" class="action-btn">📋 Buat Perencanaan</a>
            </div>
        </div>
    </div>
</body>
</html>
