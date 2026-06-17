<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizArena</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: #080812;
            background-image:
                radial-gradient(ellipse 80% 50% at 50% -20%, rgba(59,130,246,0.18), transparent),
                radial-gradient(ellipse 50% 40% at 80% 90%, rgba(139,92,246,0.12), transparent);
            color: #e2e8f0; min-height: 100vh;
            display: flex; align-items: center; justify-content: center;
        }
        h1 { font-family: 'Orbitron', sans-serif; }
        .card {
            background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px; backdrop-filter: blur(12px);
        }
        .btn {
            display: flex; align-items: center; justify-content: center; gap: 8px;
            padding: 14px 20px; border-radius: 12px; font-weight: 700; font-size: 15px;
            cursor: pointer; border: none; width: 100%;
            transition: all 0.2s cubic-bezier(0.34,1.56,0.64,1);
            position: relative; overflow: hidden;
        }
        .btn::after {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, transparent 60%);
            opacity: 0; transition: opacity 0.2s;
        }
        .btn:hover { transform: translateY(-2px) scale(1.02); }
        .btn:hover::after { opacity: 1; }
        .btn:active { transform: scale(0.98); }
        .btn-blue   { background: linear-gradient(135deg,#2563eb,#3b82f6); box-shadow: 0 4px 20px rgba(59,130,246,0.3); color:#fff; }
        .btn-orange { background: linear-gradient(135deg,#d97706,#f59e0b); box-shadow: 0 4px 20px rgba(245,158,11,0.3); color:#fff; }
        .btn-green  { background: linear-gradient(135deg,#059669,#10b981); box-shadow: 0 4px 20px rgba(16,185,129,0.3); color:#fff; }
        .btn-purple { background: linear-gradient(135deg,#7c3aed,#8b5cf6); box-shadow: 0 4px 20px rgba(139,92,246,0.3); color:#fff; }
        .btn-ghost  { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #94a3b8; }
        .btn-ghost:hover { background: rgba(255,255,255,0.09); color:#e2e8f0; }
        .input {
            width: 100%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px; padding: 12px 16px; color: #e2e8f0; font-size: 15px; outline: none;
            transition: all 0.2s;
        }
        .input:focus { border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.15); }
        .input::placeholder { color: #475569; }
        .diff-btn {
            flex: 1; padding: 10px 8px; border-radius: 10px; font-weight: 700; font-size: 13px;
            border: 2px solid rgba(255,255,255,0.1); background: rgba(255,255,255,0.04);
            cursor: pointer; transition: all 0.2s; color: #94a3b8;
        }
        .diff-btn.active-facile   { border-color: #10b981; background: rgba(16,185,129,0.15); color: #10b981; }
        .diff-btn.active-normal   { border-color: #3b82f6; background: rgba(59,130,246,0.15); color: #60a5fa; }
        .diff-btn.active-difficile{ border-color: #ef4444; background: rgba(239,68,68,0.15); color: #f87171; }
        .diff-btn:hover { background: rgba(255,255,255,0.08); color: #e2e8f0; }
        @keyframes float {
            0%,100% { transform: translateY(0px) rotate(-1deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        .floating { animation: float 4s ease-in-out infinite; }
        .glow { text-shadow: 0 0 40px rgba(59,130,246,0.6), 0 0 80px rgba(139,92,246,0.3); }
    </style>
</head>
<body>
<div style="width:100%;max-width:460px;padding:16px">

    <div class="text-center mb-8">
        <div class="floating text-7xl mb-4">⚔️</div>
        <h1 class="glow text-5xl font-bold mb-3" style="color:#fff">QuizArena</h1>
        <p style="color:#64748b;font-size:15px">Défiez vos amis dans l'arène ultime du quiz</p>
    </div>

    <div id="authSection" class="hidden space-y-3">

        <div class="card p-4 mb-1">
            <p style="font-size:12px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px">Difficulté</p>
            <div style="display:flex;gap:8px">
                <button class="diff-btn active-normal" id="diff-facile" onclick="selectDiff('facile')">🟢 Facile</button>
                <button class="diff-btn active-normal" id="diff-normal" onclick="selectDiff('normal')" style="border-color:#3b82f6;background:rgba(59,130,246,0.15);color:#60a5fa">🔵 Normal</button>
                <button class="diff-btn" id="diff-difficile" onclick="selectDiff('difficile')">🔴 Difficile</button>
            </div>
        </div>

        <div style="display:flex;gap:10px">
            <button onclick="window.createGame(false)" class="btn btn-blue">Partie normale</button>
            <button onclick="window.createGame(true)" class="btn btn-orange">Mode Rapide</button>
        </div>

        <a href="/solo" class="btn btn-green" style="text-decoration:none">Entraînement solo</a>

        <div class="card p-4 space-y-3">
            <p style="font-size:12px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px">Rejoindre une partie</p>
            <input type="text" placeholder="Code à 6 lettres" class="input" id="joinCode" style="text-transform:uppercase;letter-spacing:3px;text-align:center;font-weight:700">
            <button onclick="window.joinGame()" class="btn btn-purple">Rejoindre</button>
        </div>

        <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;padding-top:4px">
            <a href="/avatar" class="btn btn-ghost" style="text-decoration:none;font-size:13px">Mon Avatar</a>
            <a href="/shop" class="btn btn-ghost" style="text-decoration:none;font-size:13px">Boutique</a>
            <a href="/leaderboard" class="btn btn-ghost" style="text-decoration:none;font-size:13px">Classement</a>
            <a href="/history" class="btn btn-ghost" style="text-decoration:none;font-size:13px">Historique</a>
        </div>
        <button onclick="window.logout()" class="btn btn-ghost" style="color:#ef4444;border-color:rgba(239,68,68,0.3)">Déconnexion</button>
    </div>

    <div id="notAuthSection" class="space-y-3">
        <button onclick="window.toggleForm('login')" class="btn btn-blue">🔐 Se connecter</button>
        <button onclick="window.toggleForm('register')" class="btn btn-green">✨ S'inscrire</button>

        <div id="loginForm" class="card p-6 hidden space-y-4">
            <h2 style="font-family:Orbitron,sans-serif;font-size:20px;color:#60a5fa">Connexion</h2>
            <div id="loginError" class="hidden" style="background:rgba(239,68,68,0.15);border:1px solid rgba(239,68,68,0.4);border-radius:8px;padding:10px 14px;font-size:13px;color:#f87171"></div>
            <input type="email" placeholder="Email" id="loginEmail" class="input">
            <input type="password" placeholder="Mot de passe" id="loginPassword" class="input">
            <button onclick="window.login()" class="btn btn-blue">Se connecter</button>
            <button onclick="window.toggleForm()" class="btn btn-ghost">Annuler</button>
        </div>

        <div id="registerForm" class="card p-6 hidden space-y-4">
            <h2 style="font-family:Orbitron,sans-serif;font-size:20px;color:#34d399">Inscription</h2>
            <div id="regError" class="hidden" style="background:rgba(239,68,68,0.15);border:1px solid rgba(239,68,68,0.4);border-radius:8px;padding:10px 14px;font-size:13px;color:#f87171"></div>
            <input type="text" placeholder="Pseudo" id="regName" class="input">
            <input type="email" placeholder="Email" id="regEmail" class="input">
            <input type="password" placeholder="Mot de passe (min 8 caractères)" id="regPassword" class="input">
            <button onclick="window.register()" class="btn btn-green">S'inscrire</button>
            <button onclick="window.toggleForm()" class="btn btn-ghost">Annuler</button>
        </div>
    </div>

</div>

<script>
    let selectedDifficulty = 'normal';

    function selectDiff(d) {
        selectedDifficulty = d;
        ['facile','normal','difficile'].forEach(x => {
            const btn = document.getElementById('diff-' + x);
            btn.className = 'diff-btn' + (x === d ? ' active-' + x : '');
        });
    }
    selectDiff('normal');

    function checkAuth() {
        const token = localStorage.getItem('token');
        document.getElementById('authSection').classList.toggle('hidden', !token);
        document.getElementById('notAuthSection').classList.toggle('hidden', !!token);
    }
    document.addEventListener('DOMContentLoaded', checkAuth);

    window.toggleForm = function(form) {
        document.getElementById('loginForm').classList.toggle('hidden', form !== 'login');
        document.getElementById('registerForm').classList.toggle('hidden', form !== 'register');
    }

    window.register = async function() {
        const name = document.getElementById('regName').value.trim();
        const email = document.getElementById('regEmail').value.trim();
        const password = document.getElementById('regPassword').value;
        const errorDiv = document.getElementById('regError');
        errorDiv.classList.add('hidden');
        if (!name || !email || !password) return showErr(errorDiv, 'Remplis tous les champs !');
        if (password.length < 8) return showErr(errorDiv, 'Mot de passe trop court (min 8 caractères)');
        const res = await fetch('/api/register', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ name, email, password }) });
        const data = await res.json();
        if (res.ok && data.token) { localStorage.setItem('token', data.token); location = '/avatar'; }
        else showErr(errorDiv, data.message || "Erreur d'inscription");
    }

    window.login = async function() {
        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value;
        const errorDiv = document.getElementById('loginError');
        errorDiv.classList.add('hidden');
        if (!email || !password) return showErr(errorDiv, 'Remplis tous les champs !');
        const res = await fetch('/api/login', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ email, password }) });
        const data = await res.json();
        if (res.ok && data.token) { localStorage.setItem('token', data.token); location = '/'; checkAuth(); }
        else showErr(errorDiv, data.message || 'Identifiants incorrects');
    }

    window.logout = async function() {
        const t = localStorage.getItem('token');
        if (t) await fetch('/api/logout', { method: 'POST', headers: { 'Authorization': 'Bearer ' + t } }).catch(()=>{});
        localStorage.removeItem('token');
        checkAuth();
    }

    window.createGame = async function(isSpeed = false) {
        const token = localStorage.getItem('token');
        if (!token) return;
        const res = await fetch('/api/rooms', {
            method: 'POST',
            headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
            body: JSON.stringify({ is_speed: isSpeed, difficulty: selectedDifficulty }),
        });
        const data = await res.json();
        if (data.room?.code) location = '/lobby/' + data.room.code;
    }

    window.joinGame = async function() {
        const code = document.getElementById('joinCode').value.trim().toUpperCase();
        if (!code) return;
        const token = localStorage.getItem('token');
        if (!token) return;
        const res = await fetch('/api/rooms/join', {
            method: 'POST',
            headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
            body: JSON.stringify({ code })
        });
        const data = await res.json();
        if (data.room?.code) location = '/lobby/' + code;
        else alert(data.message || 'Code invalide');
    }

    function showErr(el, msg) { el.textContent = msg; el.classList.remove('hidden'); }
</script>
</body>
</html>
