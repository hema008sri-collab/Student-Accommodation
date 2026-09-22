<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Accommodation Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .property-card { transition: transform 0.2s; }
        .property-card:hover { transform: translateY(-5px); }
        .shortlisted { background-color: #dc3545 !important; color: white !important; }
    </style>
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold text-primary">Student Accommodation Finder</h2>
    
    <!-- Filter Section -->
    <div class="card p-4 shadow-sm mb-4">
        <div class="row g-3">
            <div class="col-md-5">
                <label class="form-label font-weight-bold">Accommodation Type</label>
                <select id="filterType" class="form-select">
                    <option value="">All Types</option>
                    <option value="PG">PG</option>
                    <option value="Flat">Flat</option>
                    <option value="Hostel">Hostel</option>
                </select>
            </div>
            <div class="col-md-5">
                <label class="form-label font-weight-bold">Max Monthly Budget (₹)</label>
                <input type="number" id="filterRent" class="form-control" placeholder="e.g. 10000">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button onclick="fetchProperties()" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </div>

    <!-- Listings Section -->
    <div class="row" id="propertyContainer">
        <!-- Dynamic Cards Inserted Here via AJAX -->
    </div>
</div>

<script>
let shortlistedIds = JSON.parse(localStorage.getItem('shortlisted')) || [];

function fetchProperties() {
    const type = document.getElementById('filterType').value;
    const rent = document.getElementById('filterRent').value;

    fetch(`api.php?type=${encodeURIComponent(type)}&max_rent=${encodeURIComponent(rent)}`)
        .then(response => response.json())
        .then(data => renderProperties(data))
        .catch(err => console.error('Error fetching properties:', err));
}

function renderProperties(properties) {
    const container = document.getElementById('propertyContainer');
    container.innerHTML = '';

    if (properties.length === 0) {
        container.innerHTML = `<div class="col-12 text-center text-muted"><h4>No accommodations found within this budget.</h4></div>`;
        return;
    }

    properties.forEach(prop => {
        const isShortlisted = shortlistedIds.includes(prop.id);
        const cardHtml = `
            <div class="col-md-4 mb-4">
                <div class="card property-card h-100 shadow-sm">
                    <img src="${prop.image_url}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="${prop.title}">
                    <div class="card-body">
                        <span class="badge bg-info text-dark mb-2">${prop.type}</span>
                        <h5 class="card-title">${prop.title}</h5>
                        <p class="card-text text-muted mb-1">📍 ${prop.location} | 🛏️ ${prop.sharing}</p>
                        <h6 class="text-success fw-bold">₹${parseFloat(prop.rent).toLocaleString()}/month</h6>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <button onclick="toggleShortlist(${prop.id}, this)" class="btn btn-outline-danger w-100 ${isShortlisted ? 'shortlisted' : ''}">
                            ${isShortlisted ? '♥ Shortlisted' : '♡ Shortlist'}
                        </button>
                    </div>
                </div>
            </div>
        `;
        container.innerHTML += cardHtml;
    });
}

function toggleShortlist(id, btn) {
    if (shortlistedIds.includes(id)) {
        shortlistedIds = shortlistedIds.filter(item => item !== id);
        btn.classList.remove('shortlisted');
        btn.innerText = '♡ Shortlist';
    } else {
        shortlistedIds.push(id);
        btn.classList.add('shortlisted');
        btn.innerText = '♥ Shortlisted';
    }
    localStorage.setItem('shortlisted', JSON.stringify(shortlistedIds));
}

// Initial load
document.addEventListener('DOMContentLoaded', fetchProperties);
</script>

</body>
</html>