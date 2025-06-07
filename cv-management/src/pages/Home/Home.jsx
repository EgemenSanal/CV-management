import React from 'react';
import './Home.css';
import { Link } from 'react-router-dom';

function Home() {
    return (
        <div className="home-container">
            <nav className="navbar">
                <div className="site-name">CV Creator & Manager</div>
                <div className="nav-buttons">
                    <Link to="/login" className="nav-button">Login</Link>
                    <Link to="/register" className="nav-button register-button">Register</Link>
                </div>
            </nav>

            <div className="home-content">
                <header className="home-header">
                    <h1>Welcome to CV Creator & Manager</h1>
                    <p>Create, manage, and download your professional CV effortlessly.</p>
                    <button className="cta-button">Get Started</button>
                </header>

                <section className="features-section">
                    <div className="feature-card">
                        <h2>Easy Creation</h2>
                        <p>Build your CV with our intuitive editor in minutes.</p>
                    </div>
                    <div className="feature-card">
                        <h2>Customizable Templates</h2>
                        <p>Choose from a variety of professional templates.</p>
                    </div>
                    <div className="feature-card">
                        <h2>Secure Management</h2>
                        <p>Store and manage your CVs securely in one place.</p>
                    </div>
                </section>
            </div>

            <footer className="home-footer">
                <p>© 2023 CV Creator & Manager</p>
                <div className="social-links">
                    <a href="#" className="social-link">Facebook</a>
                    <a href="#" className="social-link">Twitter</a>
                    <a href="#" className="social-link">LinkedIn</a>
                </div>
            </footer>
        </div>
    );
}

export default Home;
