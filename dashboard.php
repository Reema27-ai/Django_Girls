<?php require __DIR__ . '/includes/bootstrap.php';
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
$q = db()->prepare('SELECT id,full_name,email,created_at FROM users WHERE id=?');
$q->execute([$_SESSION['user_id']]);
$user = $q->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    unset($_SESSION['user_id']);
    header('Location: login.php');
    exit;
}
$title = 'Your dashboard | Django Girls';
require __DIR__ . '/includes/header.php'; ?>
<div class="portal" id="learning-portal">
    <aside class="sidebar">
        <h3>DG / Studio</h3><button class="active" data-tab="overview">◈ &nbsp; Overview</button><button
            data-tab="learning">▤ &nbsp; My learning</button><button data-tab="profile">◎ &nbsp; My
            profile</button><button data-tab="notes">✎ &nbsp; My notebook</button><small>Karimatu Jalloh<br>BBIT ·
            Semester 5<br>Academic project</small>
    </aside>
    <main class="portal-main">
        <div class="portal-head">
            <div>
                <div class="eyebrow">Your creative studio</div>
                <h1>Hello, <span data-user-name><?= esc($user['full_name']) ?></span> 🌸</h1>
                <p>Ready to build something beautiful today?</p>
            </div><button class="theme-button" data-theme>Switch dashboard theme</button>
        </div>
        <section class="tab-panel" data-panel="overview">
            <div class="welcome-banner">
                <div><span class="pill">YOUR CODING JOURNEY</span>
                    <h2>One line of code at a time.</h2>
                    <p>Check off each task and watch yourself grow into a confident coder.</p>
                </div>
                <div class="ring"><span data-percent>0%</span></div>
            </div>
            <div class="metrics">
                <div class="metric"><strong data-completed>0 / 4</strong><span>Tasks completed</span></div>
                <div class="metric"><strong>3</strong><span>Paths to explore</span></div>
                <div class="metric"><strong>BBIT</strong><span>My Semester 5 project</span></div>
            </div>
            <div class="workspace">
                <article class="card">
                    <div class="eyebrow">Today's to-do list</div>
                    <h3>My coding checklist</h3><label class="task-row"><input type="checkbox"
                            data-task="0"><span>Write your first heading<small>Create an HTML heading and a
                                paragraph.</small></span></label><label class="task-row"><input type="checkbox"
                            data-task="1"><span>Add your own style<small>Choose a colour palette and a readable
                                font.</small></span></label><label class="task-row"><input type="checkbox"
                            data-task="2"><span>Practise a small program<small>Write a variable and print its
                                value.</small></span></label><label class="task-row"><input type="checkbox"
                            data-task="3"><span>Review on your phone<small>Check text size, navigation, and
                                spacing.</small></span></label>
                    <p class="note">Your checklist is saved on this device.</p>
                </article>
                <article class="card">
                    <div class="eyebrow">Something creative</div>
                    <h3>Create a page that is all you.</h3>
                    <p>Add your name, your favourite skill, and one dream project you would love to build. Then try a new colour and font to make it truly yours.</p><button class="btn orange" data-go="learning">Explore my learning →</button>
                    <div class="path-detail"><strong>Something to think about</strong>
                        <p>How could your page become easier to use on a phone?</p>
                    </div>
                </article>
            </div>
        </section>
        <section class="tab-panel" data-panel="learning" hidden>
            <h2>Your learning journey</h2>
            <p>Pick a path that excites you and see what to do next.</p>
            <div class="grid">
                <article class="card"><span class="pill">Python</span>
                    <h3>Think like a coder.</h3>
                    <p>Build a foundation with variables and simple decisions.</p><button class="link"
                        data-path="python">View steps ↗</button>
                </article>
                <article class="card"><span class="pill">HTML + CSS</span>
                    <h3>Style your first page.</h3>
                    <p>Combine structure, colour, and layout.</p><button class="link" data-path="web">View steps
                        ↗</button>
                </article>
                <article class="card"><span class="pill">Creative project</span>
                    <h3>Turn your idea into reality.</h3>
                    <p>Plan a small project and explain your decisions.</p><button class="link" data-path="project">View
                        steps ↗</button>
                </article>
            </div>
        </section>
        <section class="tab-panel profile-panel" data-panel="profile" hidden>
            <h2>All about you</h2>
            <article class="card">
                <div class="profile-summary"><span class="bubble">DG</span>
                    <h3 data-user-name><?= esc($user['full_name']) ?></h3>
                    <p><?= esc($user['email']) ?></p>
                </div>
                <p><strong>Joined:</strong> <?= esc(date('d F Y', strtotime($user['created_at']))) ?></p><label
                    for="display-name">Dashboard display name</label><input id="display-name" maxlength="100"
                    value=""><button class="btn orange full" data-save-name>Save display preference</button>
                <p class="note">This changes your dashboard greeting on this device. Your registered account details
                    remain the same.</p>
            </article>
        </section>
        <section class="tab-panel profile-panel" data-panel="notes" hidden>
            <h2>Your idea notebook</h2>
            <article class="card"><label for="notes">What did you discover today?</label><textarea id="notes"
                    placeholder="A new idea, a useful tip, a question for tomorrow..."></textarea>
                <div class="actions"><button class="btn orange" data-notes>Save my notes</button><button
                        class="btn light" data-download-notes>Download notes</button></div>
                <p class="note">Saved only in this browser. Avoid private information.</p>
            </article>
        </section>
    </main>
</div>
<div class="wrap">
    <form method="post" action="logout.php"><input type="hidden" name="csrf"
            value="<?= esc($_SESSION['csrf']) ?>"><button class="btn light">Log out securely</button></form>
</div><?php require __DIR__ . '/includes/footer.php'; ?>