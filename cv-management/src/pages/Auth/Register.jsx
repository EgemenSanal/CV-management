import React from 'react';
import './Auth.css';

function Register(){
    return (
        <div className="auth-container">
            <div className="auth-card">
                <h1 className="auth-title">Register</h1>
                <form className="auth-form">
                    <input type="text" placeholder="Full Name" className="auth-input" />
                    <input type="email" placeholder="Email" className="auth-input" />
                    <input type="password" placeholder="Password" className="auth-input" />
                    <input type="password" placeholder="Confirm Password" className="auth-input" />
                    <button type="submit" className="auth-button">Register</button>
                </form>
                <p className="auth-footer">
                    Already have an account? <a href="/login" className="auth-link">Login</a>
                </p>
            </div>
        </div>
    );
};

export default Register;