<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='/'>Millwright</a>
        <!-- <img src='images/logo.png' alt='BrandName' width='30' height='30'> -->
        <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
                <li class='nav-item'>
                    <a class='nav-link active ' aria-current='page' href='/'>Home</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active ' aria-current='page' href='/machines'>M&Ps</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active ' aria-current='page' href='/all-faults'>Faults</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active ' aria-current='page' href='/spares/all'>Spares</a>
                </li>
                
                <li class='nav-item'>
                    <a class='nav-link active ' aria-current='page' href='/all-articles'>Articles</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link active ' aria-current='page' href='/employees'>Employees</a>
                </li>
                {{-- <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle active ' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                        Category
                    </a>
                    <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <li><a class='dropdown-item ' href='submenu1.php'>SubMenu1</a></li>
                        <li><a class='dropdown-item ' href='submenu2.php'>SubMenu2</a></li>
                    </ul>
                </li> --}}
                
            </ul>
            <form class="d-flex " metho='get' action='/articles/'>
                <input class="form-control me-2" name='search' type="search" placeholder="Search articles" aria-label="Search">
                <button class="btn btn-primary me-2" type="submit">Search</button>
            </form>
            <div class='btn-group '>
                <button id='userMenu' type='button' class='btn btn-primary dropdown-toggle ' data-bs-toggle='dropdown' aria-expanded='false' value=''>
                Millwright
                </button>
                <ul class='dropdown-menu dropdown-menu-lg-end'>
                <li><a class='dropdown-item ' href='/change-passwoord'>Change Password</a></li>
                <li><a class='dropdown-item ' href='/logout'>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<style>
    /* body {
        background-color: rgb(218, 225, 233);
    } */

    @media only screen and (min-width: 960px) {
        .navbar .navbar-nav .nav-item .nav-link {
            padding: 0 0.5em;
        }

        .navbar .navbar-nav .nav-item:not(:last-child) .nav-link {
            border-right: 1px solid #ffffff;
        }
    }
</style>