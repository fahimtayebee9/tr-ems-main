0\r�m��   k   �)�    _keyhttps://greencracks.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.0 
https://greencracks.com/    [m�������p4  �>1��>      $TL�`P   L`   R���>   jQuery  RdN�K�   migrateMute $T��`�   4L`   ,Sb��        �`$   I`����DaR  �  Rv�9   define  Rb&&�f   amd M
`   M`   Rc�   jquery  $T�
Ia�     I H�
 \QXJ�M   https://greencracks.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=3.4.0   a        Db          D`    1=`�    8$T�
�`�  aL`�  USb��    L    �� ѭ � Ѭ Q� Q� Q� � � � �� Q� Q� � Ѫ �� �� �� Ѯ Q� � Q� �� � ѡ ѥ �� � ѫ � Q� Q� Q� � �� Ѧ Ѥ Ѩ��   $   �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� �� I`����Da   �h  $T@�`:   L`   $T��`�   L`    Rf��B   ^(\d+)\.(\d+)\.(\d+)-�D}(            y    �-��^���|�-��^���|��o�	�9�/�
t��/�tn����/�t��/�tm�����P: �   (Sb��        I`����Daf  �  X �f       � &̈  " #�  @c   @    Rb�V��   fn  4�Dj            Ł  ��-� �-��c��o�� (Sb��         Q�`����Da:  �  ��c      @    �c  
  @    $T�
Ia�  �   Q���c  
   @ 	   $T`�`x   (L`   @Sb�� 
       Ѭ �� ��b$  �  d   ��`����Da   &  ���,�a      }GyGiC}C$T�Ua      ��a      ��a      �Qb      .geta�  �  ��@c      @    �$T�
�a      ��a      ��a      �Qb      .seta    ���c     @    ��Dr0   0         � �%%%! �-��})�� 3��3���\��	�  ��c      0� �c  
  @ 
   $TD�`D   L`   HSb�� 
       Ѭ �� �� Q�c$  �  $  ��  Q�`����Da:  *  X$Tl�`�   L`   $Rg����   migrateIsPatchEnabled   Rb�_�   noop��Du(            �������c��� ��-� ��^��������-��-��_���
�  (Sb��         I`����Qd      e.<computed>a�  (  ��c       @ @ @c     @    �Dk   0         � �%%%/ %� 4���b      8  �c  
 @    $TP�`X   L`   �(Rh�Aύ   No warning message provided �Dn0   0         �!  ���i���������`���  (Sb�� 
        Q�`����Da>  �  ��b       @ �c  
 @    $T8�`,   ]�Dh(   (         �����`�� �(Sb��         �`����Da�    ��b          �c  
 @    $T�
Ia;  �  �d	       �*�+
 @      Q���c  
   @     $T�
Ia�     ѡ��c  
   @ .   RcN��   3.4.0   Re:���   migrateVersion  �Rc�OX;   create  $TH�`L   L`   m�Dl             ���-�  m����/��4���PŊ �(Sb��         I`����Ua       ѭ�a      �$Rg�=�M   migrateDisablePatches   aN  �  X�c	       D ^  @c     @    q$T�
�a       ѭ�a      � Rfu�   migrateEnablePatchesa   =  I��c      @    �$T,�`   ]�De            �/� T�(Sb��        I`����Ua       ѭ�a      ��a�  �  X�b          @c    @    �mRb��i�   log Rc^�&�   3.0.0   0Rj��x!   JQMIGRATE: jQuery 3.0.0+ REQUIRED   Rev*��   migrateWarnings <RmQ�}/   JQMIGRATE: Migrate plugin loaded multiple times ,Ri2�ܒ   JQMIGRATE: Migrate is installed I Rf2;z�    with logging activeRd&�:
   , version   (Rh��z   migrateDeduplicateWarnings  Rdv};�   migrateTrace$T�
Ua       ѭ�a      �Rd�ErU   migrateReseta�  �  I��c      @    �Rdl
   BackCompat  Rc.��   documentRd>XO�
   compatMode  Rc^��   quirks  8Rl�Z)   jQuery is not compatible with Quirks Mode   �Rb��d   initRbx��   findDRo��5   \[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]   0Rj"�8!   ^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$   $T��`�   ,L`   �qRc7̟   slice   Rb��l   call� Rf.2m   selector-empty-id    љ4Rk�.ʀ%   jQuery( '#' ) is not a valid selector   ��D|(        <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_breaks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attendance_id');
            $table->timestamp('break_in')->nullable();
            $table->timestamp('break_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance_breaks');
    }
};
                                                                                                                                                                                                                          'linkDialog.show': 'Show Link Dialog'
      },
      history: {
        undo: 'בטל פעולה',
        redo: 'בצע שוב'
      },
      specialChar: {
        specialChar: 'SPECIAL CHARACTERS',
        select: 'Select Special characters'
      }
    }
  });
})(jQuery);
