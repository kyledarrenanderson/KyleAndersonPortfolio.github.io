<?php
$page_title = "University Projects";
include 'includes/header.php';
require_once 'templates/projectData.php';
?>

    <header>
        <h1>University Projects</h1>
        <p class="subtitle">Projects that I have worked on throughout my time at Newcastle University</p>
    </header>

    <div class="projects-list">
        <?php
        $counter = 0;
        if (isset($universityProjects)) {
            foreach ($universityProjects as $project):
                $counter++;
                ?>
                <div class="project-row">
                    <div class="project-media">
                        <?php
                        switch($project['mediaType']) {
                            case 'singleImage':
                                echo '<img src="' . $project['image'] . '" alt="' . $project['title'] . '">';
                                break;

                            case 'gif':
                                echo '<img src="' . $project['image'] . '" alt="' . $project['title'] . '" class="gif-media">';
                                break;

                            case 'embeddedVideo':
                                echo $project['videoEmbed'];
                                break;

                            case 'imageCarousel':
                                if (!empty($project['carouselImages'])) {
                                    echo '<div class="carousel-container">';
                                    echo '<div class="carousel-slides">';
                                    foreach ($project['carouselImages'] as $index => $image) {
                                        $active = ($index === 0) ? ' active' : '';
                                        echo '<div class="carousel-slide' . $active . '">';
                                        echo '<img src="' . $image . '" alt="' . $project['title'] . ' slide ' . ($index + 1) . '">';
                                        echo '</div>';
                                    }
                                    echo '</div>';
                                    echo '<button class="carousel-prev">❮</button>';
                                    echo '<button class="carousel-next">❯</button>';
                                    echo '<div class="carousel-dots">';
                                    foreach ($project['carouselImages'] as $index => $image) {
                                        $active = ($index === 0) ? ' active' : '';
                                        echo '<span class="carousel-dot' . $active . '" data-slide="' . $index . '"></span>';
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                }
                                break;

                            default:
                                if (!empty($project['image'])) {
                                    echo '<img src="' . $project['image'] . '" alt="' . $project['title'] . '">';
                                }
                        }
                        ?>
                    </div>
                    <div class="project-info">
                        <h2 class="project-title"><?php echo $project['title']; ?></h2>
                        <p class="project-description"><?php echo $project['description']; ?></p>

                        <div class="project-features">
                            <ul class="feature-list">
                                <?php foreach ($project['features'] as $feature): ?>
                                    <li class="feature-item"><?php echo $feature; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="project-technologies">
                            <?php foreach ($project['technologies'] as $tech): ?>
                                <span class="tech-tag"><?php echo $tech; ?></span>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?php echo $project['link']; ?>" class="project-link">View Project</a>
                    </div>
                </div>
            <?php endforeach;
        } ?>
    </div>

<?php include 'includes/footer.php'; ?>