/**
 * @author Vitaliy Tsutsman
 *
 * @date 2014-11-05 14:25:00
 */

import java.util.TreeMap;

public class Main {

    /**
     * Input data
     */
    private static int [] array = new int[] {1, 4, 6, 7, 6, 6, 7, 9, 1, 13};

    /**
     * Output data
     */
    private static TreeMap<Integer, Integer> duplicates = new TreeMap<Integer, Integer>();


    /**
     * Entry point
     *
     * @param args
     */
    public static void main(String[] args) {

        // Reverse array and calculate count of duplicates
        for (int i = 0; i < array.length / 2; i++) {
            int tmp = array[ array.length - i - 1 ];
            array[ array.length - i - 1 ] = array[ i ];
            array[ i ] = tmp;

            // Put elements in sorted structure
            put( i );
            put( array.length - i - 1 );
        }

        // Print result
        for (Integer i : duplicates.keySet() ) {
            Integer val = duplicates.get(i);
            if( val > 1) {
                System.out.println(i + "-" + val);
            }
        }
    }

    /**
     * Helper for collect response data.
     * Used DRY
     *
     * @param index
     */
    private static void put(Integer index) {
        // Check element before put
        if ( duplicates.containsKey( array[ index ] ) ) {
            // Get current quantity
            Integer c = duplicates.get( array[ index ] );

            // Increment quantity, duplicate has found
            duplicates.put( array[ index ], ++c );
        } else {
            // Output does not contain this element
            duplicates.put( array[ index ], 1 );
        }
    }
}
