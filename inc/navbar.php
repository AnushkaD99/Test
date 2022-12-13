<div class="navbar">
    <div class="navbar__left">
        <div class="nav-icon" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="logo">
            <img src="../images/Ezymanage lgo.png" alt="logo">
        </div>
    </div>
    <div class="navbar__right">
        <ul>
            <li>
                <a href="#">
                    <i class="fa-solid fa-bell"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-circle-user"></i>
                </a>
            </li>
            <li>
                <a href="#">
                    <span id="userName"><?php echo $Username ?></span><br>
                    <span id="designation">Teacher</span>
                </a>
            </li>
        </ul>
    </div>
</div>