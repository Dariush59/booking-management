
### Configuration 

```
sudo vim /etc/hosts
```
then add it to host file

192.168.101.101	aditiontask.com

Run the vagrant 
```
vagrant up
vagrant provision

```

To see the database and tables
```
vagrant ssh
sudo -i
mysql -u dbuser -p123
show databases;
use adition;
show tables;
```
# Adds campaign
url POST http://aditiontask.com/campaigns 
param:
```
{ "name":"5dd"}
```
# Edits campaign
url PUT http://aditiontask.com/campaigns/$id
param:
```
{ "name":"5dd"}
```
# Gets the campaign by id
url GET http://aditiontask.com/campaigns/$id

# Gets campaign list
url GET http://aditiontask.com/campaigns

# Deletes campaign by id
url DELETE /campaigns/$id

# Shows  banners belong to Campaigns
url POST http://aditiontask.com/campaign/banners


# Adds banner
url POST http://aditiontask.com/banners 
param:
```
{ 
	"name":"wregfd",
	"campaign_id":"3",
	"width":"97",
	"height":"37",
	"content":"serthd"
}
```
# Edits banner
url PUT http://aditiontask.com/banners/$id
param:
```
{ 
	"name":"sdegfd",
	"campaign_id":"3",
	"width":"97",
	"height":"37",
	"content":"sedsthd"
}
```
# Gets the banner by id
url GET http://aditiontask.com/banners/$id

# Gets banner list
url GET http://aditiontask.com/banners

# Gets the banner by width and height 
url GET /banners/recommend/$width/$height