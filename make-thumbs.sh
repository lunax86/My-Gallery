#! /bin/bash
echo "Making thumbnails (-_-).zZ"
for i in *.jpg *.jpeg *.png
do
	echo $i
	convert -thumbnail 300 $i thumbs/thumb-$i 2> /dev/null
done
echo "All Done! \(^-^)/"
exit 0