<strong>Efetuar o Git Clone</strong>
<p><i>git clone https://github.com/danilodinelli/api-frente-loja.git</i></p>

<strong>Executar o composer</strong>
<p><i>composer require laravel/installer</i></p>

<strong>Configurar conexão com o banco de dados no arquivo .env </strong>

<strong>Executar o Migrate</strong>
<p>php artisan migrate</p>

<strong>Executar o servidor interno</strong>
<p><i>php artisan serve</i></p>


<strong>Endpoints da API</strong>


<p><strong>GET - /api/customer</strong><p>
<p><strong>GET - /api/customer/{id}</strong><p>

<p><strong>POST - /api/customer/add</strong><p>
<p>
    {
		"name": "Maria",
		"cpf": "09745628798",
		"email": "maria@gmail.com",
		"address": "Estrada da Capoeira",
		"city": "Rio de Janeiro",
		"zip_code": "23026220",
		"neighborhood": "Guaratiba",
		"number": "123",
		"complement": "Casa"
	}
</p>

<p><strong>PUT - /api/customer/update/{id}</strong><p>
<p>
    {
		"name": "Maria",
		"cpf": "09745628798",
		"email": "maria@gmail.com",
		"address": "Estrada da Capoeira",
		"city": "Rio de Janeiro",
		"zip_code": "23026220",
		"neighborhood": "Guaratiba",
		"number": "123",
		"complement": "Casa"
	}
</p>

<p><strong>DELETE - /api/customer/delete/{id}</strong><p>

<hr/>

<p><strong>GET - /api/payment</strong><p>
<p><strong>GET - /api/payment/{id}</strong><p>

<p><strong>POST - /api/payment/add</strong><p>
<p>
    {
		"name": "PIX",
		"parcel": 0
	}
</p>

<p><strong>PUT - /api/payment/update/{id}</strong><p>
<p>
    {
		"name": "PIX",
		"parcel": 0
	}
</p>

<p><strong>DELETE - /api/payment/delete/{id}</strong><p>

<hr>

<p><strong>GET - /api/product</strong><p>
<p><strong>GET - /api/product/{id}</strong><p>

<p><strong>POST - /api/product/add</strong><p>
<p>
    {
        "name": "PACOTE DE FRALDA TAMANHO P",
        "quantity": 20,
        "price": 23.90
    }
</p>

<p><strong>PUT - /api/product/update/{id}</strong><p>
<p>
    {
        "name": "PACOTE DE FRALDA TAMANHO P",
        "quantity": 20,
        "price": 23.90
    }
</p>

<p><strong>DELETE - /api/product/delete/{id}</strong><p>


<hr>

<p><strong>GET - /api/order</strong><p>
<p><strong>POST - /api/order/add</strong><p>
<p>
    {
	"customer_id": 1,
	"payment_id": 1,
	"total_order": 19.00,
	"itens": 
		[
			{
			"id": 2,
			"quantity": 1,
			"price": 5.00
			},
			{
			"id": 3,
			"quantity": 1,
			"price": 7.00
			},
			{
			"id": 4,
			"quantity": 1,
			"price": 7.00
			}
		]
    }
</p>
