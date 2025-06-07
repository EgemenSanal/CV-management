import React from 'react';
import './Auth.css';

function Login(){
    return (
        <div className="auth-container">
            <div className="auth-card">
                <h1 className="auth-title">Login</h1>
                <form className="auth-form">
                    <input type="email" placeholder="Email" className="auth-input" />
                    <input type="password" placeholder="Password" className="auth-input" />
                    <button type="submit" className="auth-button">Login</button>
                </form>
                <p className="auth-footer">
                    Don't have an account? <a href="/register" className="auth-link">Register</a>
                </p>
            </div>
        </div>
    );
};

export default Login;