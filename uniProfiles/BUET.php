<?php
include './MapsDB.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangladesh University of Engineering and Technology Profile</title>
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
                <h1>Bangladesh University of Engineering and Technology</h1>
                <p>Pioneering Excellence in Engineering Education</p>
            </div>
            <div class="col-md-2"><img src="../assets/images/buet.webp" alt="BUET"></div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 sections ms-sm-auto">
                <section id="overview">
                    <h2>Overview</h2>
                    <p>The Bangladesh University of Engineering and Technology (BUET) is a prestigious institution
                        renowned for its dedication to engineering and technological education. Established in [Year],
                        BUET offers a comprehensive array of programs that equip students with the knowledge and skills
                        to drive innovation and solve real-world challenges.</p>
                    <p>BUET's campus, situated in [City], serves as a hub of engineering expertise and collaborative
                        research. The university is committed to fostering a culture of continuous learning and pushing
                        the boundaries of scientific and technological advancement.</p>
                    <p>At BUET, students have the opportunity to engage with cutting-edge research, renowned faculty,
                        and a supportive community, ensuring their readiness to excel in the global engineering
                        landscape.</p>
                </section>
                <section id="rankings">
                    <h2>Rankings</h2>
                    <p>Bangladesh University of Engineering and Technology consistently ranks among the top engineering
                        institutions in the region and has gained recognition for its contributions to technological
                        advancement.</p>
                    <div class="ranking-list">
                        <h3>Recent Rankings:</h3>
                        <ul>
                            <li>Ranked #1 in Engineering Universities</li>
                            <li>Recognized for Excellence in [Specific Engineering Field/Area]</li>
                            <li>Ranked among the Top [Number] Engineering Institutions in Asia</li>
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
                    <p>BUET seeks to admit passionate and innovative students who aspire to excel in the field of
                        engineering and technology. Admission requirements vary depending on the chosen program and
                        academic level.</p>
                    <p>For undergraduate admission, applicants typically need to provide the following:</p>
                    <ul>
                        <li>Completed online application form</li>
                        <li>High school transcripts</li>
                        <li>BUET Admission Test scores</li>
                        <li>Recommendation letters</li>
                        <li>Statement of purpose</li>
                        <li>Interview (if required)</li>
                    </ul>
                    <p>Graduate programs have specific admission criteria, including relevant test scores, academic
                        transcripts, letters of recommendation, and a research proposal.</p>
                    <p>Interested students should review the admission guidelines and deadlines for their desired
                        program.</p>
                </section>
                <section id="faculty">
                    <h2>Faculty and Departments</h2>
                    <p>Bangladesh University of Engineering and Technology boasts a distinguished faculty known for
                        their contributions to various engineering disciplines. Some of the departments and areas of
                        study at BUET include:</p>
                    <ul>
                        <li>
                            <strong>Department of Civil Engineering</strong>
                            <ul>
                                <li>Structural Engineering</li>
                                <li>Geotechnical Engineering</li>
                                <li>Transportation Engineering</li>
                                <!-- Add more areas here -->
                            </ul>
                        </li>
                        <li>
                            <strong>Department of Electrical and Electronic Engineering</strong>
                            <ul>
                                <li>Power Systems</li>
                                <li>Communications Engineering</li>
                                <li>Control Systems</li>
                                <!-- Add more areas here -->
                            </ul>
                        </li>
                        <!-- Add more departments and areas here -->
                    </ul>
                    <p>BUET is dedicated to providing students with an immersive and rigorous education led by esteemed
                        experts in their respective fields.</p>
                </section>
                <section id="tuition">
                    <h2>Tuition and Scholarships</h2>
                    <p>Bangladesh University of Engineering and Technology is committed to making engineering education
                        accessible through a range of tuition fees and scholarship opportunities.</p>
                    <h3>Tuition Fees</h3>
                    <p>Tuition fees can vary based on the program and academic level. As of the most recent data, the
                        annual tuition fees for undergraduate programs at BUET are approximately:</p>
                    <ul>
                        <li>Full-time Undergraduate: $[Amount]</li>
                        <li>Part-time Undergraduate: $[Amount] per credit</li>
                    </ul>
                    <h3>Scholarships and Financial Aid</h3>
                    <p>BUET offers merit-based scholarships to recognize outstanding academic achievements.
                        Additionally, need-based financial aid options are available to support students in their
                        pursuit of engineering excellence.</p>
                    <p>The university remains committed to assisting students in managing the cost of education and
                        investing in their engineering future.</p>
                </section>
                <?php
                $result = getData('BUET');
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
                <p>Bangladesh University of Engineering and Technology is situated in the vibrant city of Dhaka,
                providing an invigorating and intellectually stimulating environment for engineering studies.</p>
                <p>For detailed directions and to explore the campus on Google Maps,
                    <a href="' . $url . '" target="_blank" rel="noopener noreferrer">click here</a>.
                </p>
            </section>'
                    ?>
                <section id="facilities">
                    <h2>Campus Facilities</h2>
                    <ul class="facilities-list">
                        <li><i class="fas fa-book animated-icon"></i>Advanced libraries with extensive engineering
                            resources and research materials.</li>
                        <li><i class="fas fa-flask animated-icon"></i>State-of-the-art laboratories equipped for
                            cutting-edge engineering research.</li>
                        <li><i class="fas fa-microscope animated-icon"></i>Specialized facilities for scientific and
                            technical experimentation.</li>
                        <li><i class="fas fa-paint-brush animated-icon"></i>Creative spaces for innovation and
                            engineering design projects.</li>
                        <li><i class="fas fa-dumbbell animated-icon"></i>Recreational amenities for physical fitness and
                            well-being.</li>
                        <li><i class="fas fa-home animated-icon"></i>Residential accommodations promoting a vibrant
                            campus community.</li>
                        <li><i class="fas fa-utensils animated-icon"></i>Dining options offering diverse cuisines for
                            students.</li>
                        <li><i class="fas fa-users animated-icon"></i>Collaborative environments for engineering
                            discussions and teamwork.</li>
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