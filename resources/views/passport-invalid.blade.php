<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>License Issue • SecureLaravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <style>
        :root {
            --bg: #0b0f1a;
            --bg-2: #0a0d17;
            --fg: #e8ecf3;
            --muted: #9aa3b2;
            --brand: #7c6cf6;
            --brand-2: #9b6cf6;
            --danger: #ff5573;
            --stroke: rgba(255, 255, 255, .12);
            --card: rgba(255, 255, 255, .06);
            --shadow: 0 30px 80px rgba(0, 0, 0, .45);
            --r: 20px;
        }

        /* --- Alerts --- */
        .alerts{padding:0 28px 0; margin-top:6px}
        .alert{
            display:flex; align-items:flex-start; gap:10px;
            border:1px solid var(--stroke); border-radius:12px;
            padding:12px 14px;
            background:#ffffff10; color:var(--fg);
            position:relative;
            margin: 8px 0 30px;
        }
        .alert svg{flex:0 0 18px; margin-top:2px}
        .alert .msg{flex:1 1 auto}
        .alert .close{
            appearance:none; border:0; background:transparent; color:var(--muted);
            cursor:pointer; padding:2px; border-radius:8px;
        }
        .alert .close:hover{color:var(--fg)}
        .alert-success{border-color:#2fd27a33; background:#2fd27a1a}
        .alert-error  {border-color:#ff5a7933; background:#ff5a791a}
        .alert-warning{border-color:#f7c94833; background:#f7c9481a}
        .alert-info   {border-color:#7c6cf633; background:#7c6cf61a}

        @media (prefers-color-scheme: light) {
            :root {
                --bg: #f6f8ff;
                --bg-2: #eef1fb;
                --fg: #13172a;
                --muted: #5a6477;
                --card: rgba(255, 255, 255, .9);
                --stroke: rgba(15, 20, 35, .08);
                --shadow: 0 30px 80px rgba(16, 22, 40, .15);
            }
        }

        * {
            box-sizing: border-box
        }

        html, body {
            height: 100%
        }

        body {
            margin: 0;
            color: var(--fg);
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Inter, Arial;
            background: radial-gradient(900px 600px at 8% -10%, #3b3a7e40 0%, transparent 60%),
            radial-gradient(900px 600px at 92% -10%, #6f3ea640 0%, transparent 60%),
            linear-gradient(180deg, var(--bg) 0%, var(--bg-2) 100%);
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .wrap {
            width: 100%;
            max-width: 880px;
            position: relative
        }

        .glow {
            position: absolute;
            inset: -30%;
            background: radial-gradient(closest-side, #9b6cf620, transparent 70%);
            filter: blur(40px);
            z-index: 0;
            pointer-events: none
        }

        .card {
            position: relative;
            z-index: 1;
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: var(--r);
            box-shadow: var(--shadow);
            backdrop-filter: blur(14px) saturate(125%);
            overflow: hidden;
        }

        .head {
            display: flex;
            gap: 16px;
            align-items: center;
            padding: 28px 28px 10px;
        }

        .logo {
            width: 64px;
            height: 64px;
            display: grid;
            place-items: center;
            border-radius: 18px;
            color: #fff;
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            box-shadow: 0 16px 40px #7c6cf655;
            flex: 0 0 64px;
        }

        .h1 {
            margin: 0;
            font-size: 1.55rem;
            letter-spacing: .2px
        }

        .sub {
            margin: 6px 0 0;
            color: var(--muted)
        }

        .body {
            padding: 18px 28px 8px;
            display: grid;
            gap: 16px
        }

        .grid {
            display: grid;
            grid-template-columns:1.1fr .9fr;
            gap: 18px
        }

        @media (max-width: 860px) {
            .grid {
                grid-template-columns:1fr
            }
        }

        .panel {
            border: 1px solid var(--stroke);
            border-radius: 16px;
            padding: 16px;
            background: #ffffff08
        }

        .label {
            font-size: .9rem;
            color: var(--muted);
            margin-bottom: 8px
        }

        .row {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap
        }

        .input {
            flex: 1 1 280px;
            min-width: 220px;
            background: #ffffff10;
            color: var(--fg);
            border: 1px solid var(--stroke);
            border-radius: 12px;
            padding: 12px 14px;
            outline: none;
        }

        .btn {
            appearance: none;
            cursor: pointer;
            font-weight: 600;
            letter-spacing: .2px;
            padding: 12px 16px;
            border-radius: 12px;
            border: 1px solid var(--stroke);
            background: #ffffff10;
            color: var(--fg);
            transition: transform .08s ease, opacity .2s;
        }

        .btn:hover {
            transform: translateY(-1px)
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            border-color: transparent
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b, #ff2e63);
            color: #fff;
            border-color: transparent
        }

        .mono {
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace
        }

        .footer {
            padding: 10px 28px 24px;
            display: flex;
            gap: 10px;
            align-items: center;
            justify-content: space-between;
            color: var(--muted);
            font-size: .9rem
        }

        .chip {
            padding: 6px 10px;
            border: 1px solid var(--stroke);
            border-radius: 999px;
            background: #ffffff0f
        }

        @media (prefers-reduced-motion: reduce) {
            .btn:hover {
                transform: none
            }
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0
        }
    </style>
</head>
<body>

<div class="wrap">
    <div class="glow" aria-hidden="true"></div>

    {{-- Alerts stack --}}
    {{-- Success --}}
    @if(session('success'))
        <div class="alert alert-success" role="status">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none"><path d="M20 7 9 18l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <div class="msg">{{ session('success') }}</div>
            <button class="close" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    @endif

    {{-- Error --}}
    @if(session('error'))
        <div class="alert alert-error" role="alert">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none"><path d="M12 9v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <div class="msg">{{ session('error') }}</div>
            <button class="close" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    @endif

    {{-- Warning --}}
    @if(session('warning'))
        <div class="alert alert-warning" role="status">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none"><path d="M12 9v4m0 4h.01M12 2l9 17H3L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            <div class="msg">{{ session('warning') }}</div>
            <button class="close" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    @endif

    {{-- Info --}}
    @if(session('info'))
        <div class="alert alert-info" role="status">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none"><path d="M12 9h.01M11 12h2v6h-2zM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="2"/></svg>
            <div class="msg">{{ session('info') }}</div>
            <button class="close" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="alert alert-error" role="alert">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none"><path d="M12 9v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor" stroke-width="2"/></svg>
            <div class="msg">
                <strong>There were problems with your input:</strong>
                <ul style="margin: 10px 0 0 0; padding-left: 10px;">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
            <button class="close" onclick="this.parentElement.remove()" aria-label="Close">&times;</button>
        </div>
    @endif

    <div class="card" role="alert" aria-live="assertive">
        <div class="head">
            <div class="logo">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 3l7 3v6c0 4.97-3.44 9.18-8 10-4.56-.82-8-5.03-8-10V6l9-3Z" fill="white"
                          fill-opacity=".9"/>
                    <path d="M8 12l3 3 5-5" stroke="rgba(0,0,0,.25)" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div style="flex:1 1 auto">
                <h1 class="h1">License Invalid or Expired</h1>
                <p class="sub">This machine isn’t currently authorized to run the application.</p>
            </div>
            <span class="chip">License Error</span>
        </div>

        <div class="body">
            <div class="grid">
                <div class="panel">
                    <div class="label">Activate with license key</div>
                    <form method="POST" action="{{route('secure.passport.validate')}}" class="row">
                        @csrf
                        <label for="license" class="sr-only">License Key</label>
                        <input id="license" name="license" class="input mono" placeholder="XXXX-XXXX-XXXX-XXXX"
                               autocomplete="off"/>
                        <button class="btn btn-primary" type="submit">Activate</button>
                    </form>
                    <div style="margin-top:10px; font-size:.9rem; color:var(--muted)">Need help? <a
                            href="mailto:{{ config('secure.support_email', 'support@example.com') }}"
                            style="color:#cfcfff; text-decoration:none;">Contact support</a></div>
                </div>

                <div class="panel">
                    <div class="label">Machine details</div>
                    <div class="row" style="justify-content:space-between">
                        <div>Machine ID</div>
                        <div class="mono" id="mid">{{ guid() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="chip mono">{{ config('app.name') }} • {{ now()->format('Y-m-d H:i') }}</div>
        </div>
    </div>
</div>
</body>
</html>
