<!-- Left side column. contains the logo and sidebar -->
<aside id="leftsidebar" class="sidebar">
	<div class="user-info">
        <div class="image">
            <!-- <img src="images/user.png" width="48" height="48" alt="User" /> -->
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if ($user->present()->fullname() != ' '): ?>
                    <?= $user->present()->fullname(); ?>
                <?php else: ?>
                    <em>{{trans('core::core.general.complete your profile')}}.</em>
                <?php endif; ?>
            </div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="seperator" class="divider"></li> -->
                    <li><a href="{{ URL::route('logout')  }}"><i class="material-icons">input</i>{{trans('core::core.general.sign out')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="menu">
        {!! $sidebar !!}
    </div>
    
</aside>
