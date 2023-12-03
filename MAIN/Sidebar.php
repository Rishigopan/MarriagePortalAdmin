<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1 || $_COOKIE['custtypecookie'] == 2) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'Dashboard') ? "" : "collapsed"  ?>" href="Index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'BulkDataImport' || $PageTitle == 'FreeDataImport') ? "" : "collapsed"  ?>" data-bs-target=" #import-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Import</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="import-nav" class="nav-content collapse <?= ($PageTitle == 'BulkDataImport' || $PageTitle == 'FreeDataImport') ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'BulkDataImport') ? "" : "collapsed"  ?>" href="BulkDataImport.php">
                        <i class="bi bi-grid"></i>
                        <span>Bulk Data Import</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'FreeDataImport') ? "" : "collapsed"  ?>" href="FreeDataImport.php">
                        <i class="bi bi-grid"></i>
                        <span>Free Data Import</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'FreeDataDuplicate' || $PageTitle == 'BulkDataDuplicate') ? "" : "collapsed"  ?>" data-bs-target=" #duplicate-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Duplicate</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="duplicate-nav" class="nav-content collapse <?= ($PageTitle == 'FreeDataDuplicate' || $PageTitle == 'BulkDataDuplicate') ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
                    <a class="nav-link <?= ($PageTitle == 'BulkDataDuplicate') ? "" : "collapsed"  ?>" href="BulkDuplicate.php">
                        <i class="bi bi-grid"></i>
                        <span>Bulk Data Duplicate</span>
                    </a>
                </li>
                <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
                    <a class="nav-link <?= ($PageTitle == 'FreeDataDuplicate') ? "" : "collapsed"  ?>" href="ViewFreeDuplicates.php">
                        <i class="bi bi-grid"></i>
                        <span>Free Data Duplicate</span>
                    </a>
                </li>


            </ul>
        </li>



        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1 || $_COOKIE['custtypecookie'] == 2) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'ViewData') ? "" : "collapsed"  ?>" href="Lapview.php">
                <i class="bi bi-grid"></i>
                <span>View Data</span>
            </a>
        </li>

        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'BulkUploadImage') ? "" : "collapsed"  ?>" href="BulkUploadImage.php">
                <i class="bi bi-grid"></i>
                <span>Upload Bulk Image</span>
            </a>
        </li>

        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'StaffAssign') ? "" : "collapsed"  ?>" href="StaffAssign.php">
                <i class="bi bi-grid"></i>
                <span>Staff Assign</span>
            </a>
        </li>


        <li class="nav-item <?= ($_COOKIE['custtypecookie'] == 1) ? "" : "d-none" ?>">
            <a class="nav-link <?= ($PageTitle == 'BranchMaster' || $PageTitle == 'AgencyMaster' || $PageTitle == 'FeedbackMaster' || $PageTitle == 'StaffMaster' || $PageTitle == 'EducationCategoryMaster' || $PageTitle == 'JobCategoryMaster' || $PageTitle == 'ReligionMaster' || $PageTitle == 'MotherTongueMaster' || $PageTitle == 'JobTypeMaster' || $PageTitle == 'StarMaster' || $PageTitle == 'CasteMaster' || $PageTitle == 'EducationTypeMaster' || $PageTitle == 'StateMaster' || $PageTitle == 'SubCasteMaster' || $PageTitle == 'DistrictMaster' || $PageTitle == 'CityMaster' || $PageTitle == 'TypeMaster' || $PageTitle == 'PackageMaster') ? "" : "collapsed"  ?>" data-bs-target=" #master-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Masters</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="master-nav" class="nav-content collapse <?= ($PageTitle == 'BranchMaster' || $PageTitle == 'AgencyMaster' || $PageTitle == 'FeedbackMaster' || $PageTitle == 'StaffMaster' || $PageTitle == 'EducationCategoryMaster' || $PageTitle == 'JobCategoryMaster' || $PageTitle == 'ReligionMaster' || $PageTitle == 'MotherTongueMaster' || $PageTitle == 'JobTypeMaster' || $PageTitle == 'StarMaster' || $PageTitle == 'CasteMaster' || $PageTitle == 'EducationTypeMaster' || $PageTitle == 'StateMaster' || $PageTitle == 'SubCasteMaster' || $PageTitle == 'DistrictMaster' || $PageTitle == 'CityMaster' || $PageTitle == 'TypeMaster' || $PageTitle == 'PackageMaster') ? "show" : ""  ?>" data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'BranchMaster') ? "" : "collapsed"  ?>" href="BranchMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Branch</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'AgencyMaster') ? "" : "collapsed"  ?>" href="AgencyMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Agency</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'FeedbackMaster') ? "" : "collapsed"  ?>" href="FeedbackMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Feedback</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'TypeMaster') ? "" : "collapsed"  ?>" href="TypeMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Type</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'PackageMaster') ? "" : "collapsed"  ?>" href="PackageMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Package</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'StaffMaster') ? "" : "collapsed"  ?>" href="StaffMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Staff</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'CountryMaster') ? "" : "collapsed"  ?>" href="CountryMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Country</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'StateMaster') ? "" : "collapsed"  ?>" href="StateMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>State</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'DistrictMaster') ? "" : "collapsed"  ?>" href="DistrictMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>District</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'CityMaster') ? "" : "collapsed"  ?>" href="CityMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>City</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'EducationCategoryMaster') ? "" : "collapsed"  ?>" href="EducationCategoryMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Education Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'EducationTypeMaster') ? "" : "collapsed"  ?>" href="EducationTypeMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Education Type</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'JobCategoryMaster') ? "" : "collapsed"  ?>" href="JobCategoryMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Job Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'JobTypeMaster') ? "" : "collapsed"  ?>" href="JobTypeMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Job Type</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'ReligionMaster') ? "" : "collapsed"  ?>" href="ReligionMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Religion</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'CasteMaster') ? "" : "collapsed"  ?>" href="CasteMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Caste</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'SubCasteMaster') ? "" : "collapsed"  ?>" href="SubCasteMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Sub Caste</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'MotherTongueMaster') ? "" : "collapsed"  ?>" href="MotherTongueMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Mother Tongue</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($PageTitle == 'StarMaster') ? "" : "collapsed"  ?>" href="StarMaster.php">
                        <i class="bi bi-grid"></i>
                        <span>Star</span>
                    </a>
                </li>

            </ul>
        </li>





        <!-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Components</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Alerts</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Accordion</span>
                    </a>
                </li>
                <li>
                    <a href="components-badges.html">
                        <i class="bi bi-circle"></i><span>Badges</span>
                    </a>
                </li>
                <li>
                    <a href="components-breadcrumbs.html">
                        <i class="bi bi-circle"></i><span>Breadcrumbs</span>
                    </a>
                </li>
                <li>
                    <a href="components-buttons.html">
                        <i class="bi bi-circle"></i><span>Buttons</span>
                    </a>
                </li>
                <li>
                    <a href="components-cards.html">
                        <i class="bi bi-circle"></i><span>Cards</span>
                    </a>
                </li>
                <li>
                    <a href="components-carousel.html">
                        <i class="bi bi-circle"></i><span>Carousel</span>
                    </a>
                </li>
                <li>
                    <a href="components-list-group.html">
                        <i class="bi bi-circle"></i><span>List group</span>
                    </a>
                </li>
                <li>
                    <a href="components-modal.html">
                        <i class="bi bi-circle"></i><span>Modal</span>
                    </a>
                </li>
                <li>
                    <a href="components-tabs.html">
                        <i class="bi bi-circle"></i><span>Tabs</span>
                    </a>
                </li>
                <li>
                    <a href="components-pagination.html">
                        <i class="bi bi-circle"></i><span>Pagination</span>
                    </a>
                </li>
                <li>
                    <a href="components-progress.html">
                        <i class="bi bi-circle"></i><span>Progress</span>
                    </a>
                </li>
                <li>
                    <a href="components-spinners.html">
                        <i class="bi bi-circle"></i><span>Spinners</span>
                    </a>
                </li>
                <li>
                    <a href="components-tooltips.html">
                        <i class="bi bi-circle"></i><span>Tooltips</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="forms-elements.html">
                        <i class="bi bi-circle"></i><span>Form Elements</span>
                    </a>
                </li>
                <li>
                    <a href="forms-layouts.html">
                        <i class="bi bi-circle"></i><span>Form Layouts</span>
                    </a>
                </li>
                <li>
                    <a href="forms-editors.html">
                        <i class="bi bi-circle"></i><span>Form Editors</span>
                    </a>
                </li>
                <li>
                    <a href="forms-validation.html">
                        <i class="bi bi-circle"></i><span>Form Validation</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="tables-general.html">
                        <i class="bi bi-circle"></i><span>General Tables</span>
                    </a>
                </li>
                <li>
                    <a href="tables-data.html">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="charts-chartjs.html">
                        <i class="bi bi-circle"></i><span>Chart.js</span>
                    </a>
                </li>
                <li>
                    <a href="charts-apexcharts.html">
                        <i class="bi bi-circle"></i><span>ApexCharts</span>
                    </a>
                </li>
                <li>
                    <a href="charts-echarts.html">
                        <i class="bi bi-circle"></i><span>ECharts</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="icons-bootstrap.html">
                        <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
                    </a>
                </li>
                <li>
                    <a href="icons-remix.html">
                        <i class="bi bi-circle"></i><span>Remix Icons</span>
                    </a>
                </li>
                <li>
                    <a href="icons-boxicons.html">
                        <i class="bi bi-circle"></i><span>Boxicons</span>
                    </a>
                </li>
            </ul>
        </li> -->

        <!-- <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>F.A.Q</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-error-404.html">
                <i class="bi bi-dash-circle"></i>
                <span>Error 404</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-blank.html">
                <i class="bi bi-file-earmark"></i>
                <span>Blank</span>
            </a>
        </li> -->

    </ul>

</aside>