<template>
    <div class="purchase-container">
        <h1>Purchase Product</h1>
        <div v-if="product">
            <img :src="require(`../assets/${product.image.split('/').pop()}`)" :alt="product.name" class="product-image">
            <h2>{{ product.name }}</h2>
            <p class="price">${{ product.price }}</p>
            <button @click="addToCart" class="purchase-button">Confirm Add to Cart</button>
        </div>
        <div v-else>
            <p>Loading product details...</p>
        </div>
    </div>
</template>

<script>
/* eslint-disable */
import api from '@/api';

export default {
    name: 'Purchase',
    props: ['id'],
    data() {
        return {
            product: null
        };
    },
    async created() {
        console.log('Prop ID:', this.id);
        console.log('Route Params:', this.$route.params.id);
        const productId = this.id || this.$route.params.id;
        if (!productId) {
            console.error('No product ID provided');
            this.$router.push('/');
            return;
        }
        try {
            const response = await api.get(`/products/${productId}`);
            this.product = response.data;
        } catch (error) {
            console.error('Error fetching product:', error);
            this.$router.push('/');
        }
    },
    methods: {
        async addToCart() {
            try {
                await api.post('/cart', {
                    product_id: this.id,
                    quantity: 1
                });
                alert('Product added to cart!');
                this.$router.push('/cart');
            } catch (error) {
                console.error('Error adding to cart:', error);
                alert('Failed to add product to cart.');
            }
        }
    }
}
</script>

<style scoped>
.purchase-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

.product-image {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-radius: 5px;
}

.price {
    color: grey;
    font-size: 24px;
    margin: 10px 0;
}

.purchase-button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 200px;
    font-size: 18px;
    border-radius: 5px;
}

.purchase-button:hover {
    opacity: 0.7;
}
</style>