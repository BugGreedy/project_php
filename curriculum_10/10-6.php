<?php
echo "start\n";
try {
  $pattern = 0;
  if($pattern == 0){
    throw new RangeException("意図的な範囲例外");  
  } else if($pattern == 1) {
    throw new LengthException("意図的な長さ例外");
  } else {
    throw new InvalidArgumentException("意図的なその他例外");
  }
    echo "例外を投げた後\n";
} catch (RangeException $e) {
  echo "例外発生1:", $e->getMessage() . "\n";
} catch (LengthException $e) {
  echo "例外発生2:", $e->getMessage() . "\n";
} catch (Exception $e) {
  echo "例外発生3:", $e->getMessage() . "\n";
} finally {
  echo "end\n";
}
?>
