# b200-commons
B200 Commons
Having to do with common theme and functions. The "root" bundle package is worked
out here and then distributed to all the other sub modules (sub-domains) as needed
by specifying this root bundle package as "upstream" and then pushing from the
sub domain to their own "master" copy. As long as the file names are different,
the differences between the two packages should mesh well.  That is, each should
be built out in a modular fashion, with a careful awareness of what is happening
upstream and downstream at the same time.

