<?php
namespace BookingManagement;

use BookingManagement\Model\BaseModel;
use \Jacwright\RestServer\RestException;
use Exception; 
class Banner extends BaseModel 
{
	public function getCampaign(int $id = null) : array
    {
        try{
            $sql = "SELECT * FROM banners WHERE id=" . $id;
            $result = $this->conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $arr[] = $row;
                }
            }
            return ['data' => $arr];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }

 
    public function save(int $id = null, $data) : array
    {
        try{
            if (!isset($id)) {
                $sql = "INSERT INTO banners (name, campaign_id, width, height, content)
                    VALUES ('$data->name', '$data->campaign_id', '$data->width', '$data->height', '$data->content')";
            }else{
                $sql = "UPDATE banners 
                    SET name = '$data->name', campaign_id = '$data->campaign_id', width = '$data->width', height = '$data->height', content = '$data->content' 
                    WHERE id=" . $id;
            }
     
            if ($this->conn->query($sql) === TRUE) {
                return ['data'=>['id' => $this->conn->insert_id]];
            }
            return ['error' => ['message' => $this->conn->error]];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }


    public function list() : array
    {
        try{
            $sql = "SELECT * FROM banners";
            $result = $this->conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $arr[] = $row;
                }
            }
            return ['data' => $arr];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }

    public function delete(int $id) : array
    {
        try{
            $sql = "DELETE FROM banners WHERE id=" . $id;
            if ($this->conn->query($sql) === TRUE) {
                return ['data'=>['id' => $this->conn->insert_id]];
            } 
            return ['error' => ['message' => $this->conn->error]];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }

    public function recommend(int $width, int $height) : array
    {
        try{
            if (!is_numeric($width) || !is_numeric($height)) 
                throw new RestException(400, "Bad Request error");
            
            $sql = "SELECT content FROM banners WHERE width=" . $width . "&& height=" . $height;
            $result = $this->conn->query($sql);
            $arr = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $arr[] = $row;
                }
            }else{
                throw new RestException(404, "There is no result");
            }
            return ['data' => $arr];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }
}