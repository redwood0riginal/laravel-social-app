import logo from '../assets/logo.png'

const Sidebar = () => {

  return (
    <div className="container-fluid">
    <div className="row flex-nowrap">
        <div className="col-auto col-sm-3 col-md-4 col-lg-3 col-xl-3 px-sm-2 px-0 bg-dark">
            <div className="d-flex flex-column align-items-center align-items-sm-center px-3 pt-2 text-white min-vh-100">
                <a href="/" className="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span className="fs-5 d-none d-sm-inline"><img className='w-50' src={logo} alt="" /></span>
                </a>
                <ul className="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start mt-3 " id="menu">
                    <li className="nav-item ">
                        <a href="#" className="nav-link align-middle  px-0 text-light">
                            <i className=" fs-4 fa-solid fa-house"></i> <span className=" fs-4 ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="#" className="nav-link px-0 align-middle text-light">
                            <i className=" fs-4 fa-solid fa-magnifying-glass"></i> <span className=" fs-4 ms-1 d-none d-sm-inline">Explore</span></a>
                    </li>

                    <li>
                        <a href="#" className="nav-link px-0 align-middle text-light">
                            <i className=" fs-4 fa-regular fa-bell"></i> <span className=" fs-4 ms-1 d-none d-sm-inline">Notifications</span> </a>
                    </li>
                    <li>
                        <a href="#" className="nav-link px-0 align-middle text-light">
                            <i className=" fs-4 fa-regular fa-envelope"></i> <span className=" fs-4 ms-1 d-none d-sm-inline">Messages</span> </a>
                    </li>
                    <li>
                        <a href="#" className="nav-link px-0 align-middle text-light">
                            <i className=" fs-4 fa-regular fa-user"></i> <span className=" fs-4 ms-1 d-none d-sm-inline">Profile</span> </a>
                    </li>
                    <li>
                        <a href="#" className="nav-link px-0 align-middle ">
                            <i className=" fs-4 fa-solid fa-pencil"></i> <span className=" fs-4 ms-1 d-none d-sm-inline">Post</span> </a>
                    </li>
                    
                </ul>
                <hr/>
                <div className="dropdown pb-4">
                    <a href="#" className="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" className="rounded-circle"/>
                        <span className="d-none d-sm-inline mx-1">loser</span>
                    </a>
                    <ul className="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a className="dropdown-item" href="#">New project...</a></li>
                        <li><a className="dropdown-item" href="#">Settings</a></li>
                        <li><a className="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr className="dropdown-divider" />
                        </li>
                        <li><a className="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div className="col py-3">
            Content area...
        </div>
    </div>
</div>
  );
};

export default Sidebar;
