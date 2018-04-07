# b200-integrated
B200 Integrated

## Overview

This model uses the principle of subtraction rather than addition. That is, the types of websites that are needed are anticipated based on a knowledge of the different fields. When a client needs a particular type, each one (currently of twelve) is available, and the ones which are not needed are deleted.

Using this method should result in fewer conflicts as the entire package is made to work as a whole. Common components are placed in a "commons" folder. Each of the realms uses it's own database. Subdivisions within each realm can use the same database, with different prefixes, thus making use of multisite capability. Even if one realm goes down, the other should still remain functioning.

The realms are named: academic, art, building, equipment, information, news, project, resource, service, storefront, supply and trade. Of these any combination of the others may be needed at various stages. Each realm was picked based upon differences from the other. No further realms were added when it was determined that the ones already picked could cover most or all of the cases needed.
