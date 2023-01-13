<script>
import {getItem} from '../helpers/localStorage'
export default {
    methods: {
      $is(roleName) {
        return getItem('user').roles.indexOf(roleName) !== -1;
      },
      $can(permissionName) {
        return getItem('user').permissions.indexOf(permissionName) !== -1;
      }
    },
};
</script>
