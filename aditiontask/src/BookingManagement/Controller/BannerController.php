<?php 


use BookingManagement\Banner;
use \Jacwright\RestServer\RestException;

class BannerController
{   

    /**
     * Gets the banner by id 
     *
     * @url GET /banners/$id
     * 
     */
    public function getBanner(int $id = null) : array
    {
        $banner = new Banner();
        return $banner->getCampaign($id);
    }

    /**
     * Saves a banner to the database
     *
     * @url POST /banners
     * @url PUT /banners/$id
     */
    public function saveBanner(int $id = null, $data) : array
    {
        $banner = new Banner();
        return $banner->save($id = null, $data);

    }

    /**
     * Gets user list
     *
     * @url GET /banners
     */
    public function listBanners() : array
    {
        $banner = new Banner();
        return $banner->list();
    }


    /**
     * Delete banner by id
     *            
     * @url DELETE /banners/$id
     */
    public function deleteBanner(int $id) : array
    {
        $banner = new Banner();
        return $banner->delete($id);
    }

    /**
     * Gets the banner by width and height 
     *
     * @url GET /banners/recommend/$width/$height
     * 
     */
    public function recommend(int $width, int $height) : array
    {
        $banner = new Banner();
        return $banner->recommend($width, $height);
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
