<style>
    .org-tree {
        display: flex;
        justify-content: center;
        padding-bottom: 2rem;
    }
    .org-tree ul {
        padding-top: 24px; 
        position: relative;
        display: flex; 
        justify-content: center;
    }
    .org-tree li {
        text-align: center;
        list-style-type: none;
        position: relative;
        padding: 24px 8px 0 8px;
        flex: 0 1 auto;
    }
    /* Connecting Lines */
    .org-tree li::before, .org-tree li::after {
        content: ''; position: absolute; top: 0; right: 50%;
        border-top: 2px solid #94a3b8; /* Slate 400 */
        width: 50%; height: 24px;
    }
    .org-tree li::after {
        right: auto; left: 50%;
        border-left: 2px solid #94a3b8;
    }
    .org-tree li:only-child::after, .org-tree li:only-child::before {
        display: none;
    }
    .org-tree li:only-child { padding-top: 0; }
    .org-tree li:first-child::before, .org-tree li:last-child::after { border: 0 none; }
    .org-tree li:last-child::before { border-right: 2px solid #94a3b8; border-radius: 0 4px 0 0; }
    .org-tree li:first-child::after { border-radius: 4px 0 0 0; }
    .org-tree ul ul::before {
        content: ''; position: absolute; top: 0; left: 50%;
        border-left: 2px solid #94a3b8;
        width: 0; height: 24px;
        margin-left: -1px;
    }

    /* Professional Card Design */
    .org-card {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        padding: 1.25rem 1rem;
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
        min-width: 170px;
        max-width: 220px;
        position: relative;
        transition: all 0.3s ease;
    }
    .org-card:hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
        transform: translateY(-3px);
        border-color: #10b981;
    }
    .org-card .avatar {
        width: 64px;
        height: 64px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 0.75rem;
        border: 2px solid #e2e8f0;
        background-color: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        font-size: 1.5rem;
        font-weight: 900;
    }
    .org-card .name {
        font-size: 0.95rem;
        font-weight: 800;
        color: #1e293b;
        margin-bottom: 0.25rem;
        line-height: 1.2;
    }
    .org-card .position {
        font-size: 0.7rem;
        font-weight: 700;
        color: #059669;
        background-color: #d1fae5;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    /* Level 1 Specific Style */
    .level-1 > .org-card {
        min-width: 240px;
        border-top: 4px solid #059669;
        padding: 1.5rem;
    }
    .level-1 > .org-card .avatar {
        width: 80px; height: 80px;
        font-size: 2rem;
        border-color: #d1fae5;
        color: #059669;
        background-color: #ecfdf5;
    }
    .level-1 > .org-card .name { font-size: 1.1rem; }
</style>
