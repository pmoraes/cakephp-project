<?php 

class ProductService
{
	public function removeComma($number) {
		return str_replace(",", ".", $number);
	}

	public function getIdProductRelations($products) {
		$ids = array();

		foreach ($products as $key => $product) {
			$ids[] = $product['id'];
		}

		return $ids;
	}

	public function prepareProductsSold($products) {

		$totalProducts = array();

		foreach ($products as $key => $product) {
			$totalProducts[$product['Product']['name']] = (int) $product[0]['total'];
		}
		
		return json_encode($totalProducts);
	}

	public function prepareDataFromAdvancedSearch($data) {
		$conditions = array();

		if (isset($data['product']['parameter'])) {
			$conditions['SubCategory.slug'] = $data['product']['parameter'];
		}

		if(isset($data['product']['promotion'])) {
			$conditions['Product.promotion'] = (int) 1;
		}

		if(isset($data['product']['highlight'])) {
			$conditions['Product.highlight'] = (int) 1;
		}

		if(isset($data['product']['availability'])) {
			$conditions['Product.availability'] = (int) 1;
		}

		if(isset($data['product']['value'])) {
			$value = $data['product']['value'];
			if ($value) {
				$value = explode(',', $value);
				$conditions['Product.price BETWEEN ? AND ?'] = $value;
			}
		}

		return $conditions;
	}

	public function prepareToMobile($products) {
		$productsToMobile = array();

		foreach ($products as $key => $product) {
			$productsToMobile[] = array(
				'id'              => $product['Product']['id'],
				'name'            => $product['Product']['name'],
				'subCategoryName' => $product['SubCategory']['name'],
				'price'           => number_format($product['Product']['price'],2,',','.'),
				'image'           => $product['AttachmentImage']['filename']
			);
		}

		return $productsToMobile;

	}
}