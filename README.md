# PageHitCounter
Displays Results from the modx evolution PageHitCouter

Originally from the [modx-extras-repo](http://modx.com/extras/). I posted it here, because i wanted to modify it and make this modification available for everybody.

Builds on [PageHitCounter](http://modx.com/extras/package/pagehitcounter) by adding the results to the front end of the website via the [PHCResults](http://modx.com/extras/package/pagehitcounterresults) snippet.

**Parameters available :**
* `&excludeIDs` a comma seperated list of document ID's to exclude from the results 
* `&limit` => maximum number of results
* `&table_prefix` => your database prefix if different to modx_
* `&tpl` => name of template chunk for displaying the results

Example call:
```[!MostPopular? &excludeIDs=`1,2,3` &limit=`10` &table_prefix=`custom_` &tpl=`your_tpl`!] ```

**Five placeholders available :**
* [+phc.count+] 
* [+phc.pageID+]
* [+phc.title+]
* [+phc.longtitle+]
* [+phc.description+]
