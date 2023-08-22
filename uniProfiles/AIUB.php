<?php
require 'MapsDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>American International University Bangladesh Profile</title>
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
                <h1>American International University Bangladesh</h1>
                <p>Premier private university committed to global excellence</p>
            </div>
            <div class="col-md-2"><img src="../assets/images/aiub.webp" alt="aiub"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 sections ms-sm-auto">
                <section id="overview">
                    <h2>Overview</h2>
                    <p>American International University Bangladesh (AIUB) is a leading private institution known for
                        its commitment to providing quality education and fostering a global perspective. Established in
                        [Year], AIUB offers a diverse range of academic programs that empower students for success in a
                        dynamic world.</p>
                    <p>The university prides itself on its vibrant and multicultural community, where students from
                        various backgrounds come together to learn, innovate, and contribute to society. AIUB's campus
                        is located in [City], offering a conducive environment for academic and personal growth.</p>
                    <p>AIUB is dedicated to equipping its graduates with the skills, knowledge, and values needed to
                        excel in their chosen fields and make a positive impact on the global stage.</p>
                </section>
                <section id="rankings">
                    <h2>Rankings</h2>
                    <p>American International University Bangladesh has earned recognition for its academic excellence
                        and commitment to providing quality education.</p>
                    <div class="ranking-list">
                        <h3>Recent Rankings:</h3>
                        <ul>
                            <li>Ranked #1 in Private Universities Rankings</li>
                            <li>Ranked in the Top 10 Universities in [Country]</li>
                            <li>Recognized for Excellence in [Subject/Area] Studies</li>
                        </ul>
                    </div>
                </section>
                <section id="statistics">
                    <h2>Key Statistics</h2>
                    <div class="statistics-list">
                        <ul>
                            <li><strong>Total Students:</strong> [Number]</li>
                            <li><strong>Undergraduate Students:</strong> [Number]</li>
                            <li><strong>Graduate Students:</strong> [Number]</li>
                            <li><strong>Faculty Members:</strong> [Number]</li>
                            <li><strong>Student-Faculty Ratio:</strong> [Ratio]</li>
                            <li><strong>Male Students:</strong> [Percentage]</li>
                            <li><strong>Female Students:</strong> [Percentage]</li>
                        </ul>
                    </div>
                </section>
                <section id="admission">
                    <h2>Admission Requirements</h2>
                    <p>AIUB seeks to admit talented and motivated students who are passionate about learning and
                        personal growth. Admission requirements vary based on the chosen program and academic level.</p>
                    <p>To apply for undergraduate admission, applicants typically need to submit the following
                        materials:</p>
                    <ul>
                        <li>Completed online application form</li>
                        <li>High school transcripts</li>
                        <li>SAT or AIUB Admission Test scores</li>
                        <li>Recommendation letters</li>
                        <li>Personal statement</li>
                        <li>Interview (optional)</li>
                    </ul>
                    <p>Graduate programs have specific admission criteria, including relevant test scores, academic
                        transcripts, letters of recommendation, and a statement of purpose.</p>
                    <p>Prospective students are encouraged to review the admission guidelines and deadlines for their
                        desired program.</p>
                </section>
                <section id="faculty">
                    <h2>Faculty and Departments</h2>
                    <p>American International University Bangladesh boasts a diverse and accomplished faculty, offering
                        a wide range of academic programs and disciplines. Some of the departments and subjects offered
                        at AIUB include:</p>
                    <ul>
                        <li>
                            <strong>Faculty of Business Administration</strong>
                            <ul>
                                <li>Marketing</li>
                                <li>Finance</li>
                                <li>Management</li>
                                <!-- Add more subjects here -->
                            </ul>
                        </li>
                        <li>
                            <strong>Faculty of Science and Technology</strong>
                            <ul>
                                <li>Computer Science</li>
                                <li>Electrical Engineering</li>
                                <li>Information Technology</li>
                                <!-- Add more subjects here -->
                            </ul>
                        </li>
                        <!-- Add more departments and subjects here -->
                    </ul>
                    <p>AIUB is dedicated to providing students with a comprehensive and enriching educational
                        experience, guided by accomplished scholars and experts in their respective fields.</p>
                </section>
                <section id="tuition">
                    <h2>Tuition and Scholarships</h2>
                    <p>American International University Bangladesh is committed to making quality education accessible
                        through a range of tuition fees and scholarship opportunities.</p>
                    <h3>Tuition Fees</h3>
                    <p>Tuition fees can vary based on the program and academic level. As of the most recent data, the
                        annual tuition fees for undergraduate programs at AIUB are approximately:</p>
                    <ul>
                        <li>Full-time Undergraduate: $[Amount]</li>
                        <li>Part-time Undergraduate: $[Amount] per credit</li>
                    </ul>
                    <h3>Scholarships and Financial Aid</h3>
                    <p>AIUB offers merit-based and need-based scholarships to support students in pursuing their
                        academic goals. Students are encouraged to explore scholarship opportunities and financial aid
                        options during the application process.</p>
                    <p>The university is committed to helping students manage the cost of education and invest in their
                        future success.</p>
                </section>
                <?php
                $result = getData('AIUB Campus');
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
                <p>American International University Bangladesh is located in the bustling city of Dhaka, providing a dynamic and stimulating environment for learning and growth.</p>
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