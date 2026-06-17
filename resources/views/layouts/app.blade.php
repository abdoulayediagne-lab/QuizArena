<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'QuizArena') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script defer src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pusher-js@8.4.0/dist/web/pusher.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.16.1/dist/echo.iife.js"></script>
    <script>
        Pusher.logToConsole = false;
        window.Echo = new Echo({
            broadcaster: 'pusher',
            key: '{{ env("REVERB_APP_KEY") }}',
            cluster: 'mt1',
            wsHost: '{{ env("REVERB_HOST", "127.0.0.1") }}',
            wsPort: {{ env("REVERB_PORT", 8080) }},
            wssPort: {{ env("REVERB_PORT", 8080) }},
            forceTLS: false,
            enabledTransports: ['ws'],
            disableStats: true,
        });
    </script>
    <style>
        :root {
            --neon-blue: #3b82f6;
            --neon-purple: #8b5cf6;
            --neon-green: #10b981;
            --neon-orange: #f59e0b;
            --neon-red: #ef4444;
            --bg-dark: #080812;
            --bg-card: rgba(255,255,255,0.04);
            --bg-card-hover: rgba(255,255,255,0.08);
            --border: rgba(255,255,255,0.08);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            background-image:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(59,130,246,0.15), transparent),
                radial-gradient(ellipse 60% 40% at 80% 80%, rgba(139,92,246,0.1), transparent);
            color: #e2e8f0;
            min-height: 100vh;
        }

        h1, h2, .font-arena {
            font-family: 'Orbitron', sans-serif;
        }

        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 16px;
            backdrop-filter: blur(12px);
            transition: all 0.3s ease;
        }
        .card:hover { background: var(--bg-card-hover); border-color: rgba(255,255,255,0.14); }

        .btn {
            display: inline-flex; align-items: center; justify-content: center; gap: 8px;
            padding: 12px 24px; border-radius: 12px; font-weight: 700;
            font-size: 15px; cursor: pointer; border: none; outline: none;
            transition: all 0.2s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative; overflow: hidden;
        }
        .btn::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 60%);
            opacity: 0; transition: opacity 0.2s;
        }
        .btn:hover { transform: translateY(-2px) scale(1.02); box-shadow: 0 8px 30px rgba(0,0,0,0.3); }
        .btn:hover::after { opacity: 1; }
        .btn:active { transform: translateY(0) scale(0.98); }

        .btn-blue   { background: linear-gradient(135deg, #2563eb, #3b82f6); box-shadow: 0 4px 20px rgba(59,130,246,0.3); }
        .btn-purple { background: linear-gradient(135deg, #7c3aed, #8b5cf6); box-shadow: 0 4px 20px rgba(139,92,246,0.3); }
        .btn-green  { background: linear-gradient(135deg, #059669, #10b981); box-shadow: 0 4px 20px rgba(16,185,129,0.3); }
        .btn-orange { background: linear-gradient(135deg, #d97706, #f59e0b); box-shadow: 0 4px 20px rgba(245,158,11,0.3); }
        .btn-red    { background: linear-gradient(135deg, #dc2626, #ef4444); box-shadow: 0 4px 20px rgba(239,68,68,0.3); }
        .btn-ghost  { background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); color: #94a3b8; }
        .btn-ghost:hover { background: rgba(255,255,255,0.1); color: #e2e8f0; }

        .answer-btn {
            padding: 16px 20px; border-radius: 12px; font-weight: 600; font-size: 15px;
            border: 2px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.05);
            cursor: pointer; transition: all 0.2s ease; width: 100%; text-align: left; color: #e2e8f0;
        }
        .answer-btn:hover { border-color: rgba(59,130,246,0.6); background: rgba(59,130,246,0.1); transform: translateX(4px); }
        .answer-btn.selected { border-color: #3b82f6; background: rgba(59,130,246,0.2); }
        .answer-btn.correct { border-color: #10b981; background: rgba(16,185,129,0.2); animation: pulse-green 0.5s ease; }
        .answer-btn.wrong   { border-color: #ef4444; background: rgba(239,68,68,0.2); animation: shake 0.4s ease; }

        @keyframes pulse-green {
            0% { box-shadow: 0 0 0 0 rgba(16,185,129,0.6); }
            70% { box-shadow: 0 0 0 12px rgba(16,185,129,0); }
            100% { box-shadow: 0 0 0 0 rgba(16,185,129,0); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-6px); }
            40%, 80% { transform: translateX(6px); }
        }

        .navbar {
            background: rgba(8,8,18,0.9);
            border-bottom: 1px solid rgba(255,255,255,0.06);
            backdrop-filter: blur(20px);
            position: sticky; top: 0; z-index: 100;
        }
        .nav-link {
            color: #64748b; font-weight: 600; font-size: 14px; padding: 6px 12px;
            border-radius: 8px; transition: all 0.2s; text-decoration: none;
        }
        .nav-link:hover { color: #e2e8f0; background: rgba(255,255,255,0.06); }

        .coin {
            display: inline-flex; align-items: center; justify-content: center;
            width: 16px; height: 16px; border-radius: 50%;
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            box-shadow: 0 0 6px rgba(251,191,36,0.5), inset 0 1px 0 rgba(255,255,255,0.4);
            font-size: 9px; font-weight: 900; color: #92400e; flex-shrink: 0;
            vertical-align: middle; line-height: 1;
        }
        .coin::after { content: '₵'; }

        .input {
            width: 100%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px; padding: 12px 16px; color: #e2e8f0; font-size: 15px;
            outline: none; transition: all 0.2s;
        }
        .input:focus { border-color: #3b82f6; background: rgba(59,130,246,0.08); box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }
        .input::placeholder { color: #475569; }

        .timer-bar { height: 6px; border-radius: 99px; transition: width 1s linear; }
        .timer-bar-green  { background: linear-gradient(90deg, #10b981, #34d399); }
        .timer-bar-yellow { background: linear-gradient(90deg, #f59e0b, #fbbf24); }
        .timer-bar-red    { background: linear-gradient(90deg, #ef4444, #f87171); box-shadow: 0 0 8px rgba(239,68,68,0.5); }
        .timer-bar-blue   { background: linear-gradient(90deg, #3b82f6, #60a5fa); }

        .badge {
            display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px;
            border-radius: 99px; font-size: 12px; font-weight: 700;
        }
        .badge-speed  { background: rgba(245,158,11,0.2); border: 1px solid rgba(245,158,11,0.5); color: #f59e0b; }
        .badge-facile { background: rgba(16,185,129,0.2); border: 1px solid rgba(16,185,129,0.4); color: #10b981; }
        .badge-normal { background: rgba(59,130,246,0.2); border: 1px solid rgba(59,130,246,0.4); color: #60a5fa; }
        .badge-difficile { background: rgba(239,68,68,0.2); border: 1px solid rgba(239,68,68,0.4); color: #f87171; }

        .avatar-frame {
            border-radius: 12px; overflow: hidden; background: rgba(255,255,255,0.05);
            border: 2px solid rgba(255,255,255,0.1); position: relative;
        }
        .avatar-frame img { width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; }

        .lb-row {
            display: flex; align-items: center; gap: 16px; padding: 16px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.05); transition: background 0.2s;
        }

        .lb-avatar {
            width: 60px; height: 60px; border-radius: 12px;
            background: rgba(255,255,255,0.05); border: 2px solid rgba(255,255,255,0.08);
            position: relative; overflow: hidden; flex-shrink: 0;
        }

        .vs-avatar {
            width: 48px; height: 48px; border-radius: 10px;
            background: rgba(255,255,255,0.05); border: 3px solid rgba(255,255,255,0.1);
            position: relative; overflow: hidden; flex-shrink: 0;
        }

        .glow-blue   { text-shadow: 0 0 20px rgba(59,130,246,0.8); }
        .glow-purple { text-shadow: 0 0 20px rgba(139,92,246,0.8); }
        .glow-green  { text-shadow: 0 0 20px rgba(16,185,129,0.8); }
        .glow-yellow { text-shadow: 0 0 20px rgba(245,158,11,0.8); }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; } to { opacity: 1; }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to   { opacity: 1; transform: scale(1); }
        }
        @keyframes winner-dance {
            0%,100% { transform: translateY(0) rotate(0deg); }
            15%  { transform: translateY(-12px) rotate(-5deg); }
            30%  { transform: translateY(0) rotate(5deg); }
            45%  { transform: translateY(-8px) rotate(-3deg); }
            60%  { transform: translateY(0) rotate(3deg); }
            75%  { transform: translateY(-6px) rotate(-2deg); }
        }
        @keyframes loser-shake {
            0%,100% { transform: translateX(0) rotate(0deg); }
            20% { transform: translateX(-8px) rotate(-4deg); }
            40% { transform: translateX(8px) rotate(4deg); }
            60% { transform: translateX(-5px) rotate(-2deg); }
            80% { transform: translateX(5px) rotate(2deg); }
        }
        @keyframes punch {
            0%   { transform: translateX(0); }
            40%  { transform: translateX(40px); }
            60%  { transform: translateX(30px); }
            100% { transform: translateX(0); }
        }
        @keyframes hit {
            0%,100% { transform: translateX(0); }
            30% { transform: translateX(20px); }
            50% { transform: translateX(-5px); }
        }

        .animate-fade-up { animation: fadeInUp 0.5s ease forwards; }
        .animate-fade { animation: fadeIn 0.4s ease forwards; }
        .animate-scale { animation: scaleIn 0.4s cubic-bezier(0.34,1.56,0.64,1) forwards; }
        .animate-winner { animation: winner-dance 1.2s ease-in-out infinite; }
        .animate-loser  { animation: loser-shake 0.6s ease 0.3s forwards; }
        .animate-punch  { animation: punch 0.6s ease forwards; }
        .animate-hit    { animation: hit 0.6s ease 0.3s forwards; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: rgba(255,255,255,0.03); }
        ::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 99px; }

        .diff-facile   { color: #10b981; }
        .diff-normal   { color: #60a5fa; }
        .diff-difficile{ color: #f87171; }

        .category-card {
            border: 2px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.04);
            border-radius: 14px; padding: 16px 12px; text-align: center; cursor: pointer;
            transition: all 0.2s cubic-bezier(0.34,1.56,0.64,1);
        }
        .category-card:hover { transform: scale(1.05); border-color: rgba(255,255,255,0.2); background: rgba(255,255,255,0.08); }
        .category-card.active { border-color: #3b82f6; background: rgba(59,130,246,0.15); box-shadow: 0 0 20px rgba(59,130,246,0.2); }

        .item-card {
            background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px; padding: 20px; text-align: center;
            transition: all 0.25s ease;
        }
        .item-card:hover { transform: translateY(-4px); border-color: rgba(255,255,255,0.15); background: rgba(255,255,255,0.07); box-shadow: 0 12px 40px rgba(0,0,0,0.3); }

        .rarity-common   { color: #94a3b8; }
        .rarity-rare     { color: #60a5fa; text-shadow: 0 0 10px rgba(59,130,246,0.5); }
        .rarity-epic     { color: #c084fc; text-shadow: 0 0 10px rgba(139,92,246,0.5); }
        .rarity-legendary{ color: #fbbf24; text-shadow: 0 0 10px rgba(245,158,11,0.5); }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="max-w-7xl mx-auto px-6 py-3" style="display:grid;grid-template-columns:1fr auto 1fr;align-items:center">
            <a href="/" class="font-arena text-xl text-blue-400 hover:text-blue-300 transition-colors glow-blue">⚔️ QuizArena</a>
            <span id="coinDisplay" class="font-bold text-sm px-3 py-1 rounded-full" style="background:rgba(245,158,11,0.1);border:1px solid rgba(245,158,11,0.3);color:#fbbf24;display:none;gap:6px;align-items:center;justify-self:center"><span class="coin"></span><span id="coinAmount">0</span></span>
            <div class="flex gap-1 items-center" style="justify-self:end">
                <a href="/" class="nav-link">Accueil</a>
                <a href="/solo" class="nav-link">Entraînement</a>
                <a href="/avatar" class="nav-link">Avatar</a>
                <a href="/shop" class="nav-link">Boutique</a>
                <a href="/leaderboard" class="nav-link">Classement</a>
                <a href="/history" class="nav-link">Historique</a>
                <button onclick="logout()" id="logoutBtn" class="hidden btn btn-red ml-2" style="padding:8px 16px;font-size:13px">Déconnexion</button>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <script>
        const token = localStorage.getItem('token');

        if (token) {
            document.getElementById('coinDisplay').style.display = 'inline-flex';
            document.getElementById('logoutBtn').classList.remove('hidden');

            fetch('/api/profile', {
                headers: { 'Authorization': 'Bearer ' + token }
            }).then(r => r.json())
            .then(data => {
                if (data.user) {
                    document.getElementById('coinAmount').textContent = data.user.coins;
                }
            })
            .catch(() => {
                localStorage.removeItem('token');
                location = '/';
            });
        } else if (location.pathname !== '/') {
            location = '/';
        }

        function logout() {
            fetch('/api/logout', {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token }
            }).then(() => {
                localStorage.removeItem('token');
                location = '/';
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
