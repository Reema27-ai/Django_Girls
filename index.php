<?php $title = 'Django Girls | Your first line of code';
require __DIR__ . '/includes/header.php'; ?>
<section class="hero">
    <div class="studio">
        <div class="studio-copy">
            <div class="eyebrow">Django Girls / Your creative studio</div>
            <h1>Dream boldly.<br>Code bravely.<br><em>Shine brightly.</em></h1>
            <p>A warm, welcoming space where you can explore, learn to code, and design your own future in technology.</p>
            <div class="actions"><a class="btn orange" href="signup.php">Start your journey ↗</a><a class="btn light"
                    href="#learn">Discover the studio</a></div>
            <div class="note">No experience needed. Just a curious mind and a big dream.</div>
        </div>
        <div class="studio-panel">
            <div class="browser-card">
                <div class="browser-top"><span>● ● ●</span><span>your-next-chapter / dashboard</span></div>
                <div class="browser-content">
                    <div class="avatar-row"><span class="bubble">KJ</span><span class="bubble">&lt;/&gt;</span><span
                            class="bubble">✦</span></div>
                    <h3>Hello, future innovator.</h3>
                    <p>Start small. Dream big. One step at a time.</p>
                    <div class="mini-task">01 &nbsp; Pick a skill you love <strong>Explore ↗</strong></div>
                    <div class="mini-task">02 &nbsp; Turn your idea into a project <strong>Build ↗</strong></div>
                    <div class="mini-task">03 &nbsp; Celebrate every win <strong>Shine ↗</strong></div>
                </div>
            </div>
            <div class="studio-caption">Your space. Your pace. Your story.</div>
        </div>
    </div>
</section>
<main class="wrap">
    <div class="strip"><strong>Made for curious, brave minds.</strong><span>01 &nbsp; Learn the basics</span><span>02 &nbsp; Build something you love</span><span>03 &nbsp; Share and inspire</span></div>
    <section class="section" id="learn">
        <div class="intro">
            <div>
                <div class="eyebrow">Where will you begin?</div>
                <h2>Pick a path.<br>Make it yours.</h2>
            </div>
            <p>Explore a learning path below. These sample pathways show how you can grow from a first idea into a finished project.</p>
        </div>
        <div class="filter" aria-label="Filter learning paths"><button class="active" data-filter="all">All
                paths</button><button data-filter="beginner">Beginner</button><button data-filter="project">Project
                based</button></div>
        <div class="grid">
            <article class="card" data-level="beginner"><span class="number">01 / THE FOUNDATIONS</span>
                <h3>Say hello to your<br>first programming language.</h3>
                <p>Discover variables, conditions, and loops through friendly Python exercises.</p><span
                    class="pill">Beginner · Python basics</span>
                <div class="actions"><button class="link" data-path="python">View the pathway ↗</button></div>
            </article>
            <article class="card" data-level="beginner"><span class="number">02 / THE WEB</span>
                <h3>Turn a blank page<br>into your own corner of the web.</h3>
                <p>See how HTML builds the structure of a page and CSS adds your style and colour.</p><span
                    class="pill">Beginner · HTML & CSS</span>
                <div class="actions"><button class="link" data-path="web">View the pathway ↗</button></div>
            </article>
            <article class="card" data-level="project"><span class="number">03 / YOUR FIRST BUILD</span>
                <h3>Create something<br>you are proud of.</h3>
                <p>Bring your skills together in a small project and practise explaining the choices you made.</p><span
                    class="pill">Project based · Creative practice</span>
                <div class="actions"><button class="link" data-path="project">View the pathway ↗</button></div>
            </article>
        </div>
    </section>
    <section class="about" id="about">
        <div class="big-symbol" aria-hidden="true">✦</div>
        <div>
            <div class="eyebrow">Why you will love it here</div>
            <h2>Every great idea<br>deserves room to bloom.</h2>
            <p>This student platform is inspired by Django Girls: a friendly place to explore coding, ask questions, and celebrate every bit of progress.</p>
            <p>✓ A gentle starting point for beginners<br>✓ Practical ideas to build on<br>✓ A dashboard that is yours alone</p><a class="btn light" href="signup.php">Create your account ↗</a>
        </div>
    </section>
    <section class="section faq" id="faq">
        <div class="eyebrow">Questions you may have</div>
        <h2>Before you start.</h2>
        <details>
            <summary>Do I need programming experience?</summary>
            <p>Not at all. The sample learning paths start with the basics and simple exercises.</p>
        </details>
        <details>
            <summary>What happens after I create an account?</summary>
            <p>You can log in to your own dashboard, view your profile, explore practice pathways, and save your learning notes on your device.</p>
        </details>
        <details>
            <summary>Is this an official Django Girls website?</summary>
            <p>This is an academic web programming project created by Karimatu Jalloh, BBIT Semester 5. It is not an official registration service for Django Girls events.</p>
        </details>
    </section>
    <section class="cta">
        <div class="eyebrow">Your story starts here</div>
        <h2>You bring the courage.<br>We’ll build the confidence.</h2>
        <p>Your first project is waiting for you. Take that first step today.</p><a class="btn orange" href="signup.php">Join the
            community ↗</a>
    </section>
</main><?php require __DIR__ . '/includes/footer.php'; ?>