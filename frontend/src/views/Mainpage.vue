<template>
    <h1>Best Seller</h1>
    <div class="product-grid">
        <div class="card" v-for="product in products" :key="product.id">
            <img :alt="product.name" :src="require(`../assets/${product.image.split('/').pop()}`)">
            <div class="card-content">
                <h1>{{ product.name }}</h1>
                <p class="price">${{ product.price }}</p>
                <RouterLink :to="`/purchase/${product.id}`">
                    <button class="card-button">Add to Cart</button>
                </RouterLink>
            </div>
        </div>
        <div v-if="products.length === 0">No products available</div>
    </div>
    <router-view/>
</template>

<script>
/* eslint-disable */
import api from '@/api';

export default {
    name: 'MainPage',
    data() {
        return {
            products: []
        };
    },
    async created() {
        try {
            console.log('Fetching products...');
            const response = await api.get('/products');
            console.log('Raw API Response:', response);
            console.log('API Response Data:', response.data);
            this.products = response.data;
            console.log('Products after assignment:', this.products);
        } catch (error) {
            console.error('Error fetching products:', error);
            console.error('Error Details:', error.response ? error.response.data : error.message);
        }
    }
}
</script>

<style scoped>
.product-grid {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  padding: 20px;
  max-width: 1300px;
  margin: 0 auto;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 280px;
  border-radius: 5px;
  overflow: hidden;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  transform: translateY(-5px);
}

.card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 5px 5px 0 0;
}

.card-content {
  padding: 15px;
}

.card h1 {
  font-size: 20px;
  margin: 10px 0;
}

.price {
  color: grey;
  font-size: 22px;
  margin: 10px 0;
}

.card-button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  border-radius: 5px;
}

.card-button:hover {
  opacity: 0.7;
}

/* Responsive adjustments */
@media (max-width: 1200px) {
  .product-grid {
    max-width: 900px;
  }
}

@media (max-width: 900px) {
  .product-grid {
    max-width: 600px;
  }
}

@media (max-width: 630px) {
  .product-grid {
    max-width: 300px;
  }
}
</style>