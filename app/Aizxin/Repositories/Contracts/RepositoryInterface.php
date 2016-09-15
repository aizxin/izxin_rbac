<?php
namespace Aizxin\Repositories\Contracts;
/**
* 仓库接口
*/
interface RepositoryInterface
{

	/**
	* Retrieve all data of repository
	*
	* @param array $columns
	*
	* @return mixed
	*/
	public function all($columns = ['*']);
	/**
	* Find data by id
	*
	* @param       $id
	* @param array $columns
	*
	* @return mixed
	*/
	public function find($id, $columns = ['*']);
	/**
	* Find data by field and value
	*
	* @param       $field
	* @param       $value
	* @param array $columns
	*
	* @return mixed
	*/
	public function findByField($field, $value, $columns = ['*']);
	/**
	* Find data by multiple fields
	*
	* @param array $where
	* @param array $columns
	*
	* @return mixed
	*/
	public function findWhere(array $where, $columns = ['*']);
	/**
	* Find data by multiple values in one field
	*
	* @param       $field
	* @param array $values
	* @param array $columns
	*
	* @return mixed
	*/
	public function findWhereIn($field, array $values, $columns = ['*']);
	/**
	* Save a new entity in repository
	*
	* @param array $attributes
	*
	* @return mixed
	*/
	public function create(array $attributes);
	/**
	* Update a entity in repository by id
	*
	* @param array $attributes
	* @param       $id
	*
	* @return mixed
	*/
	public function update(array $attributes, $id);
	/**
	* Update or Create an entity in repository
	*
	* @throws ValidatorException
	*
	* @param array $attributes
	* @param array $values
	*
	* @return mixed
	*/
	public function updateOrCreate(array $attributes, array $values = []);
	/**
	* Delete a entity in repository by id
	*
	* @param $id
	*
	* @return int
	*/
	public function delete($id);
	/**
	* Order collection by a given column
	*
	* @param string $column
	* @param string $direction
	*
	* @return $this
	*/
	public function orderBy($column, $direction = 'asc');
	/**
	* Load relations
	*
	* @param $relations
	*
	* @return $this
	*/
	public function with($relations);

}