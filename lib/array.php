<?php

namespace {

  if(!function_exists('array_delete')){

    /**
     * Deletes entry from array and return its value
     *
     * @param array $data
     * @param string $key
     * @return mixed
     */
    function array_delete(array &$data, $key){
      if(array_key_exists($key, $data)){
        $value = $data[$key];
        unset($data[$key]);
        return $value;
      }
    }

  }

  if(!function_exists('array_get')){

    /**
     * Lookup entry in array and return value, returns false if not found
     *
     * @param array $data
     * @param string $key
     * @return mixed
     */
    function array_get(array $data, $key){
      if(array_key_exists($key, $data)){
        return $data[$key];
      }
      return false;
    }

  }

  if(!function_exists('array_flatten')){

    /**
     * Make multidimensional array flat
     *
     * @param array $array
     * @return array
     */
    function array_flatten(array $array){
      $index = 0;
      $count = count($array);

      while($index < $count){
        if(is_array($array[$index])){
          array_splice($array, $index, 1, $array[$index]);
        }else{
          ++$index;
        }
        $count = count($array);
      }
      return $array;
    }

  }

  if(!function_exists('array_pick')){

    /**
     * Return array with only the keys in $keys
     *
     * @param array $array The source
     * @param mixed $keys Keys of $array to return
     * @return array
     */
    function array_pick(array $array, $keys){
      if(func_num_args() > 2){
        $arguments = func_get_args();
        $keys = array_slice($arguments, 1);
      }elseif(!is_array($keys)){
        $keys = array($keys);
      }
      return array_intersect_key($array, array_flip($keys));
    }

  }

  if(!function_exists('array_reject')){

    /**
     * Return array without the keys in $keys.
     * This is the inverse of array_pick
     *
     * @param array $array The source
     * @param mixed $keys Keys of $array to exclude
     * @return array
     */
    function array_reject(array $array, $keys){
      if(func_num_args() > 2){
        $arguments = func_get_args();
        $keys = array_slice($arguments, 1);
      }elseif(!is_array($keys)){
        $keys = array($keys);
      }
      return array_diff_key($array, array_flip($keys));
    }

  }
}
