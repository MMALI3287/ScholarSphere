<?php
require './MapsDB.php'
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ahsanullah University of Science and Technology Profile</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/demoUni.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <nav class="sidebar">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="#overview">Overview</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#rankings">Rankings</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#statistics">Key Statistics</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#admission">Admission Requirements</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#faculty">Faculty and Departments</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#tuition">Tuition and Scholarships</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#locations">Campus Locations</a>
                </li>
                <hr>
                <li class="nav-item">
                    <a class="nav-link" href="#facilities">Campus Facilities</a>
                </li>
                <hr>
            </ul>
        </div>
    </nav>
    <div class="header">
        <div class="row">
            <div class="col-md-10">
                <h1>Ahsanullah University of Science and Technology</h1>
                <p>Empowering minds through science and technology</p>
            </div>
            <div class="col-md-2"><img src="../assets/images/aust.webp" alt="aust"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 sections ms-sm-auto">
                <section id="overview">
                    <h2>Overview</h2>
                    <p>Ahsanullah University of Science and Technology (AUST) is a renowned institution dedicated to
                        fostering excellence in science, engineering, and technology education. Established in 1995,
                        AUST offers a wide range of programs that equip students with the knowledge and skills to tackle
                        real-world challenges.</p>
                    <p>The university is committed to providing a stimulating and innovative learning environment where
                        students can explore their passions and contribute to technological advancements. AUST's campus
                        is situated in Dhaka, offering a conducive setting for academic and research pursuits.</p>
                    <p>AUST prides itself on producing graduates who are well-prepared to make significant contributions
                        to the fields of science and technology on both national and global scales.</p>
                </section>
                <section id="rankings">
                    <h2>Rankings</h2>
                    <p>Ahsanullah University of Science and Technology has received recognition for its impactful
                        contributions to science, engineering, and technology education.</p>
                    <div class="ranking-list">
                        <h3>Recent Rankings:</h3>
                        <ul>
                            <li>Ranked among the Top Engineering Universities in Bangladesh</li>
                            <li>Recognized for Excellence in Engineering Studies</li>
                            <li>Ranked #1 among public Universities of Bangladesh</li>
                        </ul>
                    </div>
                </section>
                <section id="statistics">
                    <h2>Key Statistics</h2>
                    <div class="statistics-list">
                        <ul>
                            <li><strong>Total Students:</strong> 11,321</li>
                            <li><strong>Undergraduate Students:</strong> 8,919</li>
                            <li><strong>Graduate Students:</strong> 2402</li>
                            <li><strong>Faculty Members:</strong> 587</li>
                            <li><strong>Student-Faculty Ratio:</strong> 19:1</li>
                            <li><strong>Male Students:</strong>54%</li>
                            <li><strong>Female Students:</strong> 46%</li>
                        </ul>
                    </div>
                </section>
                <section id="admission">
                    <h2>Admission Requirements</h2>
                    <p>AUST seeks to admit talented and driven students who are passionate about advancing science and
                        technology. Admission requirements vary based on the chosen program and academic level.</p>
                    <p>For undergraduate admission, applicants typically need to provide the following documents:</p>
                    <ul>
                        <li>Completed online application form</li>
                        <li>High school transcripts</li>
                        <li>Admission test scores (if applicable)</li>
                        <li>Letters of recommendation</li>
                        <li>Personal statement</li>
                        <li>Interview (if required)</li>
                    </ul>
                    <p>Graduate program applicants must fulfill specific criteria, including relevant test scores,
                        academic records, letters of recommendation, and a statement of purpose.</p>
                    <p>Prospective students are encouraged to review the admission guidelines and deadlines for their
                        desired program.</p>
                </section>
                <section id="faculty">
                    <h2>Faculty and Departments</h2>
                    <p>Ahsanullah University of Science and Technology boasts a distinguished faculty with expertise in
                        various scientific and engineering disciplines. Some of the departments and fields of study
                        offered at AUST include:</p>
                    <ul>
                        <li>
                            <strong>Department of Electrical and Electronic Engineering</strong>
                            <ul>
                                <li>Power Systems</li>
                                <li>Telecommunications</li>
                                <li>Control Systems</li>
                                <!-- Add more fields here -->
                            </ul>
                        </li>
                        <li>
                            <strong>Department of Computer Science and Engineering</strong>
                            <ul>
                                <li>Artificial Intelligence</li>
                                <li>Software Engineering</li>
                                <li>Data Science</li>
                                <!-- Add more fields here -->
                            </ul>
                        </li>
                        <!-- Add more departments and fields here -->
                    </ul>
                    <p>AUST is dedicated to providing students with rigorous academic training and hands-on experience,
                        guided by accomplished scholars and experts in their respective fields.</p>
                </section>
                <section id="tuition">
                    <h2>Tuition and Scholarships</h2>
                    <p>Ahsanullah University of Science and Technology is committed to ensuring access to quality
                        education through various tuition fees and scholarship opportunities.</p>
                    <h3>Tuition Fees</h3>
                    <p>Tuition fees vary based on the program and academic level. As of the latest data, the annual
                        tuition fees for undergraduate programs at AUST are approximately:</p>
                    <ul>
                        <li>Full-time Undergraduate: 8,23,000 Taka</li>
                    </ul>
                    <h3>Scholarships and Financial Aid</h3>
                    <p>AUST offers merit-based and need-based scholarships to support students in pursuing their
                        academic aspirations. Students are encouraged to explore scholarship opportunities and financial
                        aid options during the application process.</p>
                    <p>The university remains dedicated to assisting students in managing the cost of education and
                        investing in their future achievements.</p>
                </section>
                <?php
                $result = getData('AUST');
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $title = $row['UniversityTitle'];
                    $lat = $row['Latitude'];
                    $lng = $row['Longitude'];
                    $url = $row['url'];
                }
                echo '<section id="locations">
                <h2>Campus Locations</h2>
                <div id="map-container" class="pb-5">
                    <div id="map" data-lat="' . $lat . '" data-lng="' . $lng . '" data-title="' . $title . '"></div>
                </div>
                <p>Ahsanullah University of Science and Technology is situated in the vibrant city of [City],
                providing a dynamic environment for learning and exploration.</p>
                <p>For detailed directions and to explore the campus on Google Maps,
                    <a href="' . $url . '" target="_blank" rel="noopener noreferrer">click here</a>.
                </p>
            </section>'
                    ?>
                <section id="facilities">
                    <h2>Campus Facilities</h2>
                    <ul class="facilities-list">
                        <li><i class="fas fa-book animated-icon"></i>Modern libraries with extensive collections of
                            books, journals, and digital resources.</li>
                        <li><i class="fas fa-flask animated-icon"></i>Advanced research centers equipped with
                            cutting-edge technology for interdisciplinary studies.</li>
                        <li><i class="fas fa-microscope animated-icon"></i>Well-equipped laboratories for scientific and
                            technical research.</li>
                        <li><i class="fas fa-paint-brush animated-icon"></i>Art studios and creative spaces for artistic
                            expression.</li>
                        <li><i class="fas fa-dumbbell animated-icon"></i>Recreational facilities for sports, fitness,
                            and wellness.</li>
                        <li><i class="fas fa-home animated-icon"></i>Residential accommodations fostering a vibrant
                            campus community.</li>
                        <li><i class="fas fa-utensils animated-icon"></i>Dining options offering a variety of cuisines.
                        </li>
                        <li><i class="fas fa-users animated-icon"></i>Collaborative spaces for group projects and
                            academic discussions.</li>
                        <li><i class="fas fa-hospital animated-icon"></i>Support services including counseling and
                            career development.</li>
                    </ul>
                </section>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTR26_-VtI2fhWyKGnoYv_uKNJnl4p_2w&callback=initMap"
        async defer></script>
    <script src="../js/demoUni.js"></script>
</body>

</html>