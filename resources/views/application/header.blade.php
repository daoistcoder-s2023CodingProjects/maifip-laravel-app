<nav class="maifip-navbar" style="justify-content: center;">
    <div class="navbar-left" style="margin: 0 auto;">
        <img src="/images/maifip_logo.png" alt="MAIFIP Logo" class="maifip-logo">
        <div class="maifip-brand">
            <div class="maifip-title">MAIFIP</div>
            <div class="maifip-desc">Medical Assistance to Indigent and Financially Incapacitated Patients</div>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="application-form-wrapper" style="max-width:900px;margin:0 auto;">
        @include('application.form')
    </div>
</div>
<style>
.application-form-wrapper {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 0 2rem 0;
    background: none !important;
    box-shadow: none !important;
}
.application-form-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px 0 rgba(24, 103, 55, 0.04);
    padding: 1.5rem 2rem 1.5rem 2rem;
    margin-top: 2rem;
}
.application-form {
    background: none !important;
    box-shadow: none !important;
    padding: 0;
    margin-top: 0;
}

/* Responsive MAIFIP navbar for mobile */
@media (max-width: 600px) {
    .maifip-navbar {
        padding: 1rem 2rem 1rem 1rem !important;
    }
    .navbar-left {
        margin: 0 !important;
    }
    .maifip-logo {
        height: 38px !important;
        width: 38px !important;
        margin-bottom: 0.5rem !important;
    }
    .maifip-title {
        font-size: 1.05rem !important;
    }
    .maifip-desc {
        font-size: 0.85rem !important;
    }
}
</style>
