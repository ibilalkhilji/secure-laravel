<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>License Invalid or Expired</title>
    <style>
        :root {
            --bg: #0b0d10;
            --panel: #0f1114;
            --muted: #9aa3b2;
            --accent: #ff6b6b;
            --brand1: #7c6cf6;
            --brand2: #9b6cf6;
            --glass: rgba(255, 255, 255, 0.03);
            --stroke: rgba(255, 255, 255, 0.06);
            --radius: 14px;
            --mono: ui-monospace, SFMono-Regular, Menlo, Monaco, "Roboto Mono", "Courier New", monospace;
            color-scheme: dark
        }

        * {
            box-sizing: border-box
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, Arial;
            color: #e6eef8;
            background: linear-gradient(180deg, var(--bg) 0%, #07090b 100%);
            padding: 28px
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            border-radius: 12px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.02), rgba(255, 255, 255, 0.01));
            border: 1px solid var(--stroke);
            box-shadow: 0 30px 80px rgba(1, 4, 12, 0.6);
            overflow: hidden
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            padding: 20px 26px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
            background: linear-gradient(90deg, rgba(124, 108, 246, 0.06), transparent 40%)
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 18px
        }

        .badge {
            display: inline-grid;
            place-items: center;
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--brand1), var(--brand2));
            box-shadow: 0 8px 24px rgba(124, 108, 246, 0.12);
            font-weight: 700;
            color: #fff;
            flex: 0 0 44px
        }

        .title {
            display: flex;
            flex-direction: column;
            gap: 3px;
            min-width: 0
        }

        .title h1 {
            margin: 0;
            font-size: 20px
        }

        .title p {
            margin: 0;
            color: var(--muted);
            font-size: 13px
        }

        .chips {
            display: flex;
            gap: 8px;
            flex-wrap: wrap
        }

        .chip {
            background: var(--glass);
            border: 1px solid var(--stroke);
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            color: var(--muted)
        }

        .alerts {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px
        }

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            border: 1px solid var(--stroke);
            border-radius: 10px;
            padding: 12px 14px;
            background: #ffffff10;
            color: var(--fg);
            position: relative;
            overflow: hidden
        }

        .alert svg {
            flex: 0 0 18px;
            margin-top: 2px
        }

        .alert .msg {
            flex: 1 1 auto
        }

        .alert .close {
            appearance: none;
            border: 0;
            background: rgba(255, 255, 255, 0.08);
            color: var(--muted);
            cursor: pointer;
            width: 22px;
            height: 22px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            transition: all .2s ease;
            font-weight: 600;
            line-height: 0
        }

        .alert .close:hover {
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
            transform: rotate(90deg)
        }

        .alert-success {
            border-color: #2fd27a33;
            background: #2fd27a1a
        }

        .alert-error {
            border-color: #ff5a7933;
            background: #ff5a791a
        }

        .alert-warning {
            border-color: #f7c94833;
            background: #f7c9481a
        }

        .alert-info {
            border-color: #7c6cf633;
            background: #7c6cf61a
        }

        .content {
            padding: 24px;
            display: grid;
            grid-template-columns:1fr 1fr;
            gap: 24px
        }

        @media (max-width: 900px) {
            .content {
                grid-template-columns:1fr
            }
        }

        .card {
            padding: 20px;
            border-radius: 12px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.015), rgba(255, 255, 255, 0.01));
            border: 1px solid var(--stroke)
        }

        .form {
            display: flex;
            gap: 8px;
            align-items: center;
            margin-top: 12px
        }

        @media (max-width: 520px) {
            .form {
                flex-direction: column;
                align-items: stretch
            }
        }

        .input {
            flex: 1;
            padding: 12px 14px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.06);
            background: transparent;
            color: var(--fg);
            font-family: var(--mono);
            letter-spacing: 1px
        }

        .btn {
            padding: 12px 16px;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            border: 0
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--brand1), var(--brand2));
            color: #fff
        }

        .btn-ghost {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.06);
            color: var(--fg)
        }

        .small {
            font-size: .95rem;
            color: var(--muted)
        }

        footer {
            padding: 12px 18px;
            border-top: 1px solid rgba(255, 255, 255, 0.02);
            color: var(--muted);
            display: flex;
            justify-content: space-between
        }
    </style>
</head>
<body>
<div class="container" role="region" aria-label="License activation view">
    <div class="header">
        <div class="header-left">
            <div class="badge" aria-hidden="true">!</div>
            <div class="title" role="heading" aria-level="1">
                <h1>License Invalid or Expired</h1>
                <p class="muted">This machine isn’t currently authorized to run the application.</p>
            </div>
        </div>
        <div class="chips">
            <div class="chip">App Version {{App::version()}}</div>
            <div class="chip">License Error</div>
        </div>
    </div>

    <div class="alerts">
        @if(session('success'))
            <div class="alert alert-success" role="status">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none">
                    <path d="M20 7 9 18l-5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
                <div class="msg">{{ session('success') }}</div>
                <button class="close" onclick="this.parentElement.remove()" aria-label="Close">×</button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error" role="alert">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none">
                    <path d="M12 9v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round"/>
                </svg>
                <div class="msg">{{ session('error') }}</div>
                <button class="close" onclick="this.parentElement.remove()" aria-label="Close">×</button>
            </div>
        @endif

        @if(session('warning'))
            <div class="alert alert-warning" role="status">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none">
                    <path d="M12 9v4m0 4h.01M12 2l9 17H3L12 2Z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round"/>
                </svg>
                <div class="msg">{{ session('warning') }}</div>
                <button class="close" onclick="this.parentElement.remove()" aria-label="Close">×</button>
            </div>
        @endif

        @if(session('info'))
            <div class="alert alert-info" role="status">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none">
                    <path d="M12 9h.01M11 12h2v6h-2zM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor"
                          stroke-width="2"/>
                </svg>
                <div class="msg">{{ session('info') }}</div>
                <button class="close" onclick="this.parentElement.remove()" aria-label="Close">×</button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error" role="alert">
                <svg viewBox="0 0 24 24" width="18" height="18" fill="none">
                    <path d="M12 9v4m0 4h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" stroke="currentColor"
                          stroke-width="2"/>
                </svg>
                <div class="msg">
                    <strong>There were problems with your input:</strong>
                    <ul style="margin:10px 0 0 0; padding-left:10px;">
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                </div>
                <button class="close" onclick="this.parentElement.remove()" aria-label="Close">×</button>
            </div>
        @endif
    </div>

    <div class="content">
        <div class="card">
            <h2 style="margin:0 0 10px 0">Activate your license</h2>
            <p class="small">Enter your license key below to authorize this machine.</p>
            <form method="POST" action="{{ route('secure.passport.validate') }}" class="form">
                @csrf
                <label for="license" class="sr-only">License Key</label>
                <input id="license" name="license" class="input mono" placeholder="XXXX-XXXX-XXXX-XXXX"
                       autocomplete="off" required/>
                <button type="submit" class="btn btn-primary">Activate</button>
            </form>
            <div style="margin-top:15px;display:flex;justify-content:space-between;align-items:center">
                <div class="small">Need help? <a
                        href="mailto:{{ config('secure.support_email','support@example.com') }}"
                        style="color:inherit;text-decoration:underline">Contact support</a></div>
            </div>
        </div>

        <div class="card">
            <h3 style="margin:0 0 8px 0">Machine details</h3>
            <div class="small" style="margin-bottom: 5px">Machine ID: <span class="mono" id="mid">{{ guid() }}</span>
            </div>
            <div class="small" style="margin-bottom: 5px">App: <span class="mono">{{ config('app.name') }}</span></div>
            <div class="small" style="margin-bottom: 5px">Time: <span
                    class="mono">{{ now()->format('d M Y h:i A') }}</span></div>
        </div>
    </div>

    <footer>
        <div class="small">{{ config('app.name') }} • {{ now()->format('Y') }}</div>
        <div class="small">&copy; All rights reserved</div>
    </footer>
</div>
</body>
</html>
