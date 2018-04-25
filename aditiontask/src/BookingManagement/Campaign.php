<?php
namespace BookingManagement;

use Exception;
use BookingManagement\Model\BaseModel;
class Campaign extends BaseModel 
{

	public function getCampaign(int $id = null) : array
    {
        try{
            $sql = "SELECT * FROM campaigns WHERE id=" . $id;
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
                $sql = "INSERT INTO campaigns (name) VALUES ('$data->name')";
            }else{
                $sql = "UPDATE campaigns SET name='$data->name' WHERE id=" . $id;
            }

            if (!$this->conn->query($sql)) 
                throw new Exception($this->conn->error);
                
            return ['data'=>['id' => $id ?? $this->conn->insert_id]];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }


    public function list() : array
    {
        try{    
            $sql = "SELECT * FROM campaigns";
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
            $sql = "DELETE campaigns,banners FROM campaigns
                INNER JOIN
                    banners ON banners.campaign_id = campaigns.id 
                WHERE
                    campaigns.id = " . $id;

            if (!$this->conn->query($sql))
                throw new Exception($this->conn->error);

            if (isset($this->getCampaign($id)['data'][0])) {
                $sql = "DELETE  FROM campaigns WHERE id = " . $id;
                if (!$this->conn->query($sql))
                    throw new Exception($this->conn->error);
            }

            return ['data'=>['id' => $id]];

        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }

    public function campaignAndBanners() : array
    {

        try{
            $sql = "SELECT * FROM campaigns
                INNER JOIN
                    banners ON banners.campaign_id = campaigns.id";

            $result = $this->conn->query($sql);

            $arr = [];
            $data = [];
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $arr['id'] = $row['id'];
                    $arr['name'] = $row['name'];
                    $arr['banners']['campaign_id'] = $row['campaign_id'];
                    $arr['banners']['width'] = $row['width'];
                    $arr['banners']['height'] = $row['height'];
                    $arr['banners']['content'] = $row['content'];
                    $data[] = $arr;
                }
            }
            return ['data' => $data];
        }catch (Throwable $e){
            throw new Exception($e->getMessage());
        }
    }
}