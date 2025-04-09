<div class="navbar">
    <a href="index.php" <?php echo isCurrentPage('index') ? 'class="active"' : ''; ?>>Home</a>
    <a href="aboutMe.php" <?php echo isCurrentPage('aboutMe') ? 'class="active"' : ''; ?>>About Me</a>
    <a href="universityProjects.php" <?php echo isCurrentPage('universityProjects') ? 'class="active"' : ''; ?>>University Projects</a>
    <a href="personalProjects.php" <?php echo isCurrentPage('personalProjects') ? 'class="active"' : ''; ?>>Personal Projects</a>
    <a href="contactMe.php" <?php echo isCurrentPage('contactMe') ? 'class="active"' : ''; ?>>Contact Me</a>

    <div class="theme-toggle">
        <label class="switch">
            <input type="checkbox" id="theme-toggle">
            <span class="slider">
                <span class="sun-icon">&#127774</span>
                <span class="moon-icon">&#127770</span>
            </span>
        </label>
    </div>
</div>