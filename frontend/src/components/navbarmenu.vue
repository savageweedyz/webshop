<template>
  <nav>
    <img alt="Logo" src="../assets/chick_logo.png">
    <div class="nav-buttons">
      <router-link to="/" class="nav-btn">Home</router-link> 
      <router-link to="/about" class="nav-btn">About</router-link>
      <div class="dropdown">
        <button class="nav-btn dropdown-btn">Products</button>
        <div class="dropdown-content">
          <router-link to="/product1">Product 1</router-link>
          <router-link to="/product2">Product 2</router-link>
          <router-link to="/product3">Product 3</router-link>
        </div>
      </div>
    </div>
  </nav>
  <router-view/>
</template>

<script>
/* eslint-disable */
export default {
    name: 'Navbarmenu',
}
</script>

<style scoped>
img {
    width: 150px;
    height: 100px;
}

nav {
    display: flex;
    font-size: 20px;
    align-items: center;
    background-color: #e99904;
    padding: 0px 10px;
}

.nav-buttons {
    display: flex;
    text-align: center;
    justify-content: center;
    gap: 20px;
    padding: 10px;
    margin: 0 20px;
    position: relative;
}

nav a {
    font-weight: bold;
    color: #ffffff;
    text-decoration: none;
    margin-right: 15px;
}

.nav-btn {
    padding: 8px 16px;
    border-radius: 4px;
    transition: all 0.3s ease;
    display: inline-block;
    margin-right: 10px;
    background: none;
    border: none;
    color: #ffffff;
    font-weight: bold;
    font-size: 20px;
    cursor: pointer;
}

.nav-btn:hover {
    background-color: #e7ad41;
    color: #000000;
    display: block;
}

nav a.router-link-exact-active {
    color: #000000;
    background-color: #e99904;
}

/* Dropdown styling */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-btn {
    background: none;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 4px;
    margin-top: 5px;
    left: 0;
}

.dropdown-content a {
    color: #333;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    margin: 0;
    font-weight: normal;
}

.dropdown-content a:hover {
    background-color: #e7ad41;
    color: #000;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropdown-btn {
    background-color: #e7ad41;
    color: #000000;
}
</style>