<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workspace | {{ config('app.name', 'Files') }}</title>
    <script>
        window.App = window.App || {};
        window.App.user = @json([
            'username'=>auth()->user()->username,
            'email'=>auth()->user()->email
        ]);
    </script>
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
</head>

<body class="workspace-body">
    <div class="workspace-shell">
        <aside class="workspace-sidebar">
            <div class="brand-mark"><span class="brand-symbol">⌁</span><span>files<span class="brand-dot">.</span></span>
            </div>
            <div class="sidebar-label">Workspace</div>
            <nav class="sidebar-nav" aria-label="Main navigation">
                <a class="sidebar-link active" href="#"><span class="nav-icon">▦</span>Overview</a>
                <a class="sidebar-link" href="#files"><span class="nav-icon">□</span>All files <span
                        class="nav-count">48</span></a>
                <a class="sidebar-link" href="#shared"><span class="nav-icon">♧</span>Shared with me</a>
                <a class="sidebar-link" href="#starred"><span class="nav-icon">☆</span>Starred</a>
                <a class="sidebar-link" href="#trash"><span class="nav-icon">⌫</span>Trash</a>
            </nav>
            <div class="sidebar-bottom">
                <div class="storage-card">
                    <div class="storage-title"><span>Storage</span><strong>68%</strong></div>
                    <div class="storage-track"><span></span></div>
                    <p>6.8 GB of 10 GB used</p>
                    <button type="button" class="upgrade-link">Upgrade storage <span>↗</span></button>
                </div>
                <a class="sidebar-link" href="#settings"><span class="nav-icon">⚙</span>Settings</a>
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button class="sidebar-link sidebar-button" type="submit"><span class="nav-icon">↪</span>Log
                        out</button>
                </form>
            </div>
        </aside>

        <main class="workspace-main">
            <header class="workspace-header">
                <button class="mobile-menu" type="button" aria-label="Open navigation">☰</button>
                <div class="breadcrumb"><span>Workspace</span><b>/</b><strong>Overview</strong></div>
                <div class="header-actions">
                    <button class="icon-button" type="button" aria-label="Notifications">♧<i></i></button>
                    <div class="profile-chip">
                        <span class="avatar" id="avatar"></span>
                        <span class="profile-name" id="profile-name"></span>
                        <span class="chevron">⌄</span>
                    </div>
                </div>
            </header>

            <div class="content-wrap">
                <section class="welcome-row">
                    <div>
                        <p class="eyebrow" id="actualDate"></p>
                        <h1>Good morning, <label id="nametitle"></label> <span>✦</span></h1>
                        <p class="welcome-copy">Here is what is happening in your workspace today.</p>
                    </div>
                    <button class="primary-action" id="openUploadModal" type="button"><span>＋</span> Upload files</button>
                </section>

                <section class="stats-grid" aria-label="Workspace summary">
                    <article class="stat-card coral">
                        <div class="stat-icon">□</div>
                        <div>
                            <p>Total files</p><strong>48</strong><small> <em>↑ 12%</em> from last month</small>
                        </div>
                    </article>
                    <article class="stat-card mint">
                        <div class="stat-icon">↗</div>
                        <div>
                            <p>Shared with me</p><strong>12</strong><small> <em>↑ 4%</em> from last month</small>
                        </div>
                    </article>
                    <article class="stat-card sky">
                        <div class="stat-icon">◷</div>
                        <div>
                            <p>Storage used</p><strong>6.8 <small>GB</small></strong><small><em>68%</em> of your total
                                space</small>
                        </div>
                    </article>
                </section>

                <section class="dashboard-grid">
                    <div class="panel recent-panel" id="files">
                        <div class="panel-heading">
                            <div>
                                <h2>Recent files</h2>
                                <p>Files you have worked on recently</p>
                            </div><a href="#all-files">View all <span>→</span></a>
                        </div>
                        <div class="file-toolbar"><label class="search-box"><span>⌕</span><input type="search"
                                    placeholder="Search files"></label><button class="filter-button"
                                type="button">Filter <span>⌄</span></button></div>
                        <div class="file-table-wrap">
                            <table class="file-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Owner</th>
                                        <th>Last modified</th>
                                        <th>Size</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span class="file-type pdf">PDF</span><strong>Brand guidelines.pdf</strong>
                                        </td>
                                        <td><span class="owner"><span class="mini-avatar amber">JD</span> You</span>
                                        </td>
                                        <td>Today, 9:42 AM</td>
                                        <td>2.4 MB</td>
                                        <td><button class="more-button" aria-label="More options">•••</button></td>
                                    </tr>
                                    <tr>
                                        <td><span class="file-type fig">✣</span><strong>Q3 Campaign concepts</strong>
                                        </td>
                                        <td><span class="owner"><span class="mini-avatar violet">MC</span> Maya
                                                Chen</span></td>
                                        <td>Yesterday</td>
                                        <td>18.2 MB</td>
                                        <td><button class="more-button" aria-label="More options">•••</button></td>
                                    </tr>
                                    <tr>
                                        <td><span class="file-type doc">W</span><strong>Project brief.docx</strong></td>
                                        <td><span class="owner"><span class="mini-avatar blue">JD</span> You</span>
                                        </td>
                                        <td>Aug 25, 2026</td>
                                        <td>845 KB</td>
                                        <td><button class="more-button" aria-label="More options">•••</button></td>
                                    </tr>
                                    <tr>
                                        <td><span class="file-type zip">ZIP</span><strong>Product photos.zip</strong>
                                        </td>
                                        <td><span class="owner"><span class="mini-avatar green">AR</span> Alex
                                                Rivera</span></td>
                                        <td>Aug 23, 2026</td>
                                        <td>124 MB</td>
                                        <td><button class="more-button" aria-label="More options">•••</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <aside class="panel activity-panel">
                        <div class="panel-heading">
                            <div>
                                <h2>Activity</h2>
                                <p>Latest workspace updates</p>
                            </div><button class="more-button" aria-label="More activity options">•••</button>
                        </div>
                        <div class="activity-list">
                            <div class="activity-item"><span class="activity-avatar coral-bg">MC</span>
                                <p><strong>Maya Chen</strong> shared <b>Q3 Campaign concepts</b><small>12 minutes
                                        ago</small></p>
                            </div>
                            <div class="activity-item"><span class="activity-avatar green-bg">AR</span>
                                <p><strong>Alex Rivera</strong> uploaded <b>Product photos.zip</b><small>Yesterday at
                                        4:18 PM</small></p>
                            </div>
                            <div class="activity-item"><span class="activity-avatar blue-bg">JD</span>
                                <p><strong>You</strong> renamed <b>Project brief.docx</b><small>Aug 25, 2026</small></p>
                            </div>
                        </div><a class="activity-link" href="#activity">See all activity <span>→</span></a>
                    </aside>
                </section>
            </div>
        </main>
        <div class="upload-modal" id="uploadModal" aria-hidden="true">
            <div class="upload-modal-overlay" id="uploadModalOverlay"></div>

            <div class="upload-modal-content" role="dialog" aria-modal="true" aria-labelledby="uploadModalTitle">
                <div class="upload-modal-header">
                    <div>
                        <h2 id="uploadModalTitle">Upload file</h2>
                        <p>Select a file to upload to your workspace.</p>
                    </div>

                    <button type="button" class="upload-modal-close" id="closeUploadModal" aria-label="Close modal">
                        ×
                    </button>
                </div>

                <form id="uploadForm">

                    <div class="upload-dropzone" id="uploadDropzone" >
                        <input type="file" id="fileInput" name="file" hidden >

                        <div class="upload-icon">
                            ↑
                        </div>

                        <h3>Drop your file here</h3>

                        <p>
                            or
                        </p>

                        <button type="button" class="select-file-button" id="selectFileButton" >
                            Browse files
                        </button>

                        <small>
                            Maximum file size: 100 MB
                        </small>
                    </div>

                    <div class="selected-file hidden" id="selectedFile" >
                        <div class="selected-file-info">
                            <span class="selected-file-icon">
                                □
                            </span>

                            <div>
                                <strong id="selectedFileName"></strong>
                                <small id="selectedFileSize"></small>
                            </div>
                        </div>

                        <button type="button" id="removeSelectedFile" aria-label="Remove file" >
                            ×
                        </button>
                    </div>

                    <div class="upload-error hidden" id="uploadError" ></div>

                    <div class="upload-modal-footer">

                        <button type="button" class="secondary-button" id="cancelUpload" >
                            Cancel
                        </button>

                        <button type="submit" class="primary-action" id="submitUpload" disabled >
                            Upload file
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
