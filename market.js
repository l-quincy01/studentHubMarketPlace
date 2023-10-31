
    document.addEventListener("DOMContentLoaded", function () {
            function updateCart(product) {
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

              var id = product.getAttribute('data-id');
            var name = product.getAttribute('data-name');
            var price = parseFloat(product.getAttribute('data-price'));

                var existingProduct = cart.find(item => item.id === id);

            if (existingProduct) {
                            existingProduct.count += 1;
                existingProduct.total = existingProduct.count * price;
            } else {
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    count: 1,
                    total: price
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));

            updateCartDisplay();
        }

        function updateCartDisplay() {
            var cartItems = document.getElementById('cartItems');
            var totalAmount = document.getElementById('totalPrice');
            var cart = JSON.parse(localStorage.getItem('cart')) || [];

            if (cart.length === 0) {
                cartItems.innerHTML = "Your cart is empty.";
                totalAmount.textContent = "0 R";
            } else {
                var cartHTML = '<table>';
                var totalPrice = 0;

                cart.forEach(item => {
                    cartHTML += '<tr><td>' + item.name + '</td>';
                    cartHTML += '<td>' + item.count + ' item' + (item.count > 1 ? 's' : '') + '</td>';
                    cartHTML += '<td> ' + 'R' + item.total + '</td></tr>';
                    totalPrice += item.total;
                });

                cartHTML += '</table>';
                cartItems.innerHTML = cartHTML;
                totalAmount.textContent = totalPrice + ' R';
            }
        }

		var addButtons = document.querySelectorAll('.tiny');
		for (var i = 0; i < addButtons.length; i++) {
			addButtons[i].addEventListener('click', function () {
				if (this.id !== 'checkout') {  
					updateCart(this.parentElement);
				}
			});
		}

        document.getElementById('clear').addEventListener('click', function () {
            localStorage.removeItem('cart');
            updateCartDisplay();
        });
		
		 document.getElementById('checkout').addEventListener('click', function () {
            localStorage.removeItem('cart');
            updateCartDisplay();
        });
		



       


    updateCartDisplay();
    });
