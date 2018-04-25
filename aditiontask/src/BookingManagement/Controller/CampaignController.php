<?php


use BookingManagement\Campaign;
use \Jacwright\RestServer\RestException;

class CampaignController 
{

    /**
     * Gets the campaign by id
     *
     * @url GET /campaigns/$id
     */
    public function getCampaign(int $id) : array
    {
        try{
            $campaign = new Campaign();
            return $campaign->getCampaign($id);
        }catch (Throwable $e){
            return ['erorr' => $e->getMessage()];
        }
        
    }

    /**
     * Saves a user to the database
     *
     * @url POST /campaigns
     * @url PUT /campaigns/$id
     */
    public function saveCampaign(int $id = null, $data) : array
    {
        try{
            $campaign = new Campaign();
            return $campaign->save($id, $data);  
        }catch (Throwable $e){
            return ['erorr' => $e->getMessage()];
        }
        
    }

    /**
     * Gets campaign list
     *
     * @url GET /campaigns
     */
    public function listCampaign() : array
    {
        try{
            $campaign = new Campaign();
            return $campaign->list(); 
        }catch (Throwable $e){
            return ['erorr' => $e->getMessage()];
        }
        
    }


    /**
     * Delete campaign by id
     *            
     * @url DELETE /campaigns/$id
     */
    public function deleteCampaign(int $id) : array
    {
        try{
            $campaign = new Campaign();
            return $campaign->delete($id);
        }catch (Throwable $e){
            return ['erorr' => $e->getMessage()];
        }
    }

    /**
     * campaign banners
     *            
     * @url POST /campaign/banners
     */
    public function campaignAndBanners() : array
    {
        try{
            $campaign = new Campaign();
            return $campaign->campaignAndBanners($id);
        }catch (Throwable $e){
            return ['erorr' => $e->getMessage()];
        }
    }


    /**
     * Throws an error
     * 
     * @url GET /error
     */
    public function throwError() {
        throw new RestException(401, "Empty password not allowed");
    }
}
