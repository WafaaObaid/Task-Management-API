<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TaskFlow — Think, plan, and track</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root{
    --ink:#17181A;
    --canvas:#EFEDE8;
    --card:#FFFFFF;
    --blue:#2F5FE0;
    --blue-deep:#1F3F9E;
    --teal:#14B8A6;
    --yellow:#FFD65C;
    --line:#DAD7CF;
    --muted:#8A8781;
  }
  *{box-sizing:border-box; margin:0; padding:0;}
  body{
    font-family:'Inter', sans-serif;
    background:var(--canvas);
    color:var(--ink);
    -webkit-font-smoothing:antialiased;
  }
  .stage{
    max-width:1180px;
    margin:28px auto;
    background:var(--canvas);
    border-radius:22px;
    overflow:hidden;
    background-image:radial-gradient(circle, rgba(0,0,0,0.06) 1px, transparent 1px);
    background-size:22px 22px;
    position:relative;
  }
  header{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:22px 40px;
    background:rgba(255,255,255,0.6);
    backdrop-filter:blur(6px);
    border-bottom:1px solid var(--line);
  }
  .logo{
    display:flex;
    align-items:center;
    gap:10px;
    font-family:'Space Grotesk', sans-serif;
    font-weight:700;
    font-size:20px;
    letter-spacing:-0.02em;
  }
  .logo-mark{
    width:30px; height:30px;
    background:var(--ink);
    border-radius:9px;
    display:flex;
    align-items:center;
    justify-content:center;
  }

  .auth-actions{display:flex; align-items:center; gap:12px;}
  .btn-ghost{
    font-family:'Inter';
    font-weight:500;
    font-size:14.5px;
    color:var(--ink);
    background:transparent;
    border:1px solid transparent;
    padding:10px 18px;
    border-radius:999px;
    cursor:pointer;
    transition:.2s;
  }
  .btn-ghost:hover{border-color:var(--line); background:#fff;}
  .btn-solid{
    font-family:'Inter';
    font-weight:600;
    font-size:14.5px;
    color:#fff;
    background:var(--ink);
    border:none;
    padding:11px 22px;
    border-radius:999px;
    cursor:pointer;
    transition:.2s;
  }
  .btn-solid:hover{background:var(--blue-deep);}

  main.hero{
    position:relative;
    padding:70px 60px 90px;
    display:flex;
    flex-direction:column;
    align-items:center;
    text-align:center;
    min-height:640px;
  }

  .icon-mark{
    background:#fff;
    padding:16px;
    border-radius:16px;
    box-shadow:0 10px 24px rgba(0,0,0,0.08);
    margin-bottom:26px;
    display:flex;
    align-items:center;
    justify-content:center;
  }

  h1{
    font-family:'Space Grotesk', sans-serif;
    font-weight:700;
    font-size:64px;
    line-height:1.15;
    letter-spacing:-0.02em;
    color:var(--ink);
  }
  h1 .light{
    display:block;
    color:#B9B5AC;
    font-weight:600;
  }

  .sub{
    max-width:520px;
    margin:22px auto 34px;
    font-size:17px;
    color:#57544E;
    line-height:1.7;
  }

  .cta{
    font-family:'Inter';
    font-weight:600;
    font-size:15.5px;
    color:#fff;
    background:var(--blue);
    border:none;
    padding:15px 34px;
    border-radius:999px;
    cursor:pointer;
    box-shadow:0 12px 22px -8px rgba(47,95,224,0.55);
    transition:.2s;
  }
  .cta:hover{background:var(--blue-deep); transform:translateY(-1px);}

  /* ============ New interactive floaters ============ */
  .floater{
    position:absolute;
    filter:drop-shadow(0 14px 22px rgba(0,0,0,0.08));
    transition:transform .3s ease, filter .3s ease;
  }
  .floater:hover{
    filter:drop-shadow(0 18px 30px rgba(0,0,0,0.14));
    z-index:5;
  }

  @keyframes bob{
    0%,100%{ transform:translateY(0); }
    50%{ transform:translateY(-8px); }
  }

  /* ---- 1. Workflow / kanban floater (top right) ---- */
  .kanban-floater{
    top:56px;
    right:64px;
    width:186px;
    background:#fff;
    border-radius:14px;
    padding:16px;
    transform:rotate(-4deg);
    animation:bob 6s ease-in-out infinite;
  }
  .kanban-floater:hover{ transform:rotate(0deg) scale(1.04); }
  .kanban-floater .kf-title{
    font-family:'Space Grotesk';
    font-weight:700;
    font-size:12.5px;
    margin-bottom:10px;
    text-align:left;
  }
  .kf-lanes{ display:flex; gap:6px; }
  .kf-lane{ flex:1; text-align:left; }
  .kf-lane-label{
    font-family:'IBM Plex Mono';
    font-size:7px;
    text-transform:uppercase;
    letter-spacing:.04em;
    color:var(--muted);
    margin-bottom:6px;
  }
  .kf-card{
    height:16px;
    border-radius:5px;
    margin-bottom:5px;
    background:#F0EFEA;
  }
  .kf-lane:nth-child(1) .kf-card:nth-child(2){ background:#E4ECFD; }
  .kf-lane:nth-child(2) .kf-card{ background:#FFF3D2; }
  .kf-lane:nth-child(3) .kf-card{ background:#DFF3F0; }
  .kf-moving{
    position:relative;
    background:var(--blue) !important;
    animation:kfMove 4.5s ease-in-out infinite;
  }
  @keyframes kfMove{
    0%, 15%{ transform:translateX(0); background:var(--blue); }
    45%, 60%{ transform:translateX(64px); background:#F5B300; }
    85%, 100%{ transform:translateX(128px); background:#14B8A6; }
  }

  /* ---- 2. Progress ring floater (right, mid height) ---- */
  .progress-floater{
    top:250px;
    right:38px;
    width:96px; height:96px;
    background:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 10px 20px rgba(0,0,0,0.08);
    animation:bob 6s ease-in-out infinite 1.2s;
  }
  .progress-floater:hover{ transform:scale(1.08); }
  .progress-ring-track{ stroke:#EDEBE6; }
  .progress-ring-fill{
    stroke:var(--blue);
    stroke-linecap:round;
    transform-origin:50% 50%;
    transform:rotate(-90deg);
    stroke-dasharray:207;
    stroke-dashoffset:207;
    animation:drawRing 2s ease-out .4s forwards;
  }
  @keyframes drawRing{
    to{ stroke-dashoffset:58; }
  }
  .progress-label{
    font-family:'Space Grotesk';
    font-weight:700;
    font-size:15px;
    position:absolute;
    top:50%; left:50%;
    transform:translate(-50%, -50%);
  }

  /* ---- 3. Animated flow-path floater (left, upper) ---- */
  .flow-floater{
    top:120px;
    left:56px;
    width:210px;
    background:#fff;
    border-radius:14px;
    padding:16px 16px 14px;
    transform:rotate(3deg);
    animation:bob 6s ease-in-out infinite .6s;
  }
  .flow-floater:hover{ transform:rotate(0deg) scale(1.04); }
  .flow-floater .ff-title{
    font-family:'Space Grotesk';
    font-weight:700;
    font-size:12.5px;
    text-align:left;
    margin-bottom:8px;
  }
  .ff-labels{
    display:flex;
    justify-content:space-between;
    font-family:'IBM Plex Mono';
    font-size:7px;
    color:var(--muted);
    margin-top:4px;
  }
  .ff-node{ animation:nodePulse 3.6s ease-in-out infinite; }
  .ff-node:nth-of-type(2){ animation-delay:.5s; }
  .ff-node:nth-of-type(3){ animation-delay:1s; }
  @keyframes nodePulse{
    0%, 100%{ opacity:.45; }
    50%{ opacity:1; }
  }

  /* ---- 4. Streak calendar floater (bottom left) ---- */
  .streak-floater{
    bottom:26px;
    left:64px;
    width:200px;
    background:#fff;
    border-radius:14px;
    padding:16px;
    box-shadow:0 14px 26px rgba(0,0,0,0.09);
    animation:bob 6s ease-in-out infinite 1.8s;
  }
  .streak-floater:hover{ transform:scale(1.04); }
  .sf-head{
    display:flex;
    align-items:center;
    justify-content:space-between;
    margin-bottom:10px;
  }
  .sf-title{
    font-family:'Space Grotesk';
    font-weight:700;
    font-size:12.5px;
  }
  .sf-streak{
    font-family:'IBM Plex Mono';
    font-size:9px;
    background:#FFF3D2;
    color:#8A6A00;
    padding:2px 7px;
    border-radius:6px;
  }
  .sf-grid{
    display:grid;
    grid-template-columns:repeat(7, 1fr);
    gap:4px;
  }
  .sf-day{
    width:100%;
    aspect-ratio:1;
    border-radius:4px;
    background:#F0EFEA;
  }
  .sf-day.on{ background:var(--teal); }
  .sf-day.today{
    background:var(--blue);
    animation:dayPop 2.4s ease-in-out infinite;
  }
  @keyframes dayPop{
    0%, 100%{ transform:scale(1); }
    50%{ transform:scale(1.25); }
  }

  footer{
    text-align:center;
    padding:26px;
    font-size:12.5px;
    color:var(--muted);
    border-top:1px solid var(--line);
  }

  @media (max-width:820px){
    .stage{margin:0; border-radius:0;}
    header{padding:16px 20px;}
    main.hero{padding:50px 20px 80px; min-height:auto;}
    h1{font-size:38px;}
    .floater{display:none;}
    .sub{font-size:15px;}
  }

  :focus-visible{outline:2px solid var(--blue); outline-offset:2px;}
</style>
</head>
<body>
  <div class="stage">
    <header>
      <div class="logo">
        <div class="logo-mark">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
            <path d="M3 15 C 3 8, 9 8, 9 15 S 15 22, 15 15 S 21 8, 21 15" stroke="#FFFFFF" stroke-width="2.4" stroke-linecap="round" fill="none"/>
            <circle cx="21" cy="15" r="2.2" fill="#14B8A6"/>
          </svg>
        </div>
        TaskFlow
      </div>
      <div class="auth-actions">
        <a href="{{ route('login') }}" class="btn-ghost text-decoration-none">
    Login
</a>
      <a href="{{ route('register') }}" class="btn-solid text-decoration-none">
    Register
</a>
      </div>
    </header>

    <main class="hero">

      <!-- 1. Workflow / kanban -->
      <div class="floater kanban-floater">
        <div class="kf-title">Workflow</div>
        <div class="kf-lanes">
          <div class="kf-lane">
            <div class="kf-lane-label">To do</div>
            <div class="kf-card"></div>
            <div class="kf-card kf-moving"></div>
          </div>
          <div class="kf-lane">
            <div class="kf-lane-label">Doing</div>
            <div class="kf-card"></div>
          </div>
          <div class="kf-lane">
            <div class="kf-lane-label">Done</div>
            <div class="kf-card"></div>
          </div>
        </div>
      </div>

      <!-- 2. Progress ring -->
      <div class="floater progress-floater">
        <svg width="72" height="72" viewBox="0 0 72 72">
          <circle class="progress-ring-track" cx="36" cy="36" r="33" fill="none" stroke-width="6"/>
          <circle class="progress-ring-fill" cx="36" cy="36" r="33" fill="none" stroke-width="6"/>
        </svg>
        <div class="progress-label">72%</div>
      </div>

      <!-- 3. Animated flow path -->
      <div class="floater flow-floater">
        <div class="ff-title">Task flow</div>
        <svg width="178" height="34" viewBox="0 0 178 34" fill="none">
          <path d="M10 25 C 40 25, 40 9, 70 9 S 110 25, 140 25 S 168 9, 168 9" stroke="#DAD7CF" stroke-width="2" fill="none"/>
          <circle class="ff-node" cx="10" cy="25" r="5" fill="#2F5FE0"/>
          <circle class="ff-node" cx="89" cy="17" r="5" fill="#F5B300"/>
          <circle class="ff-node" cx="168" cy="9" r="5" fill="#14B8A6"/>
          <circle r="3.5" fill="#17181A">
            <animateMotion dur="3.6s" repeatCount="indefinite"
              path="M10 25 C 40 25, 40 9, 70 9 S 110 25, 140 25 S 168 9, 168 9"/>
          </circle>
        </svg>
        <div class="ff-labels">
          <span>Draft</span><span>Review</span><span>Done</span>
        </div>
      </div>

      <!-- 4. Streak calendar -->
      <div class="floater streak-floater">
        <div class="sf-head">
          <span class="sf-title">Your streak</span>
          <span class="sf-streak">🔥 5 days</span>
        </div>
        <div class="sf-grid">
          <div class="sf-day on"></div>
          <div class="sf-day on"></div>
          <div class="sf-day"></div>
          <div class="sf-day on"></div>
          <div class="sf-day on"></div>
          <div class="sf-day on"></div>
          <div class="sf-day today"></div>
        </div>
      </div>

      <div class="icon-mark">
        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
          <path d="M3 15 C 3 8, 9 8, 9 15 S 15 22, 15 15 S 21 8, 21 15" stroke="#17181A" stroke-width="2.4" stroke-linecap="round" fill="none"/>
          <circle cx="21" cy="15" r="2.2" fill="#14B8A6"/>
        </svg>
      </div>

      <h1>
        Think, plan, and track
        <span class="light">all in one flow</span>
      </h1>

      <p class="sub">Efficiently manage your tasks and boost your productivity.</p>

      <a href="{{ route('register') }}" class="cta text-decoration-none">
    Get free demo
</a>

    </main>

    <footer>© 2026 TaskFlow — All rights reserved</footer>
  </div>
</body>
</html>
