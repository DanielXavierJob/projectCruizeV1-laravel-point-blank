@extends('projectcruize.__construct.construct.sprint')

@section('content')
<!--BREADCRUMBS BEGIN-->
<section class="image-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="info">
                    <div class="wrap">
                        <ul class="breadcrumbs">
                            <li><a href="index-2.html">Main</a>/</li>
                            <li>Category</li>
                        </ul>
                        <h1>Category</h1>
                    </div>
                </div>
            </div>	
        </div>
    </div>
</section>
<!--BREADCRUMBS END-->

    <!--CONTENT BEGIN-->

    <div class="content">
        <div class="container">
            <div class="row row-offcanvas row-offcanvas-left">

                <!--SIEDBAR BEGIN-->

                <section class="sidebar col-xs-6 col-sm-6 col-md-3 sidebar-offcanvas" id="sidebar">
                    <div class="sidebar-menu-wrap">
                        <h6>Categories</h6>
                        <ul class="categories-list">
                            <li>
                                <a href="#"><span class="count">4</span>News</a>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="count">22</span>Competitions & Reviews</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"><span class="count">12</span>News</a></li>
                                    <li><a href="#"><span class="count">10</span>Competitions & Reviews</a></li>
                                    <li><a href="#"><span class="count">9</span>Interviews</a></li>
                                    <li><a href="#"><span class="count">8</span>Highlights</a></li>
                                    <li><a href="#"><span class="count">7</span>Other</a></li>	
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="count">4</span>Interviews</a>
                            </li>
                            <li>
                                <a href="#"><span class="count">4</span>Highlights</a>
                            </li>
                            <li>
                                <a href="#"><span class="count">4</span>Other</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sidebar-search-wrap">
                        <h6>Search</h6>
                        <form>
                            <div class="wrap">
                                <input type="text">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-calendar">
                        <h6>News Calendar</h6>
                        <div class="widget widget_calendar">
                            <div id="calendar_wrap" class="calendar_wrap">
                                <table id="wp-calendar">
                                    <caption>September 2017</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col" title="Monday">M</th>
                                            <th scope="col" title="Tuesday">T</th>
                                            <th scope="col" title="Wednesday">W</th>
                                            <th scope="col" title="Thursday">T</th>
                                            <th scope="col" title="Friday">F</th>
                                            <th scope="col" title="Saturday">S</th>
                                            <th scope="col" title="Sunday">S</th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        <tr>
                                            <td colspan="2" class="pad"> </td>
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>7</td>
                                            <td>8</td>
                                            <td>
                                                <a href="#calendar" aria-label="Posts published on February 9, 2017">9</a>
                                            </td>
                                            <td>
                                                <a href="#calendar" aria-label="Posts published on February 10, 2017">10</a>
                                            </td>
                                            <td>11</td>
                                            <td>12</td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td>14</td>
                                            <td>15</td>
                                            <td>16</td>
                                            <td>17</td>
                                            <td>18</td>
                                            <td>19</td>
                                        </tr>
                                        <tr>
                                            <td>20</td>
                                            <td>21</td>
                                            <td>22</td>
                                            <td>23</td>
                                            <td>24</td>
                                            <td>25</td>
                                            <td>26</td>
                                        </tr>
                                        <tr>
                                            <td>27</td>
                                            <td>28</td>
                                            <td class="pad" colspan="5"> </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" id="prev" class="pad">August</td>
                                            <td class="pad"> </td>
                                            <td colspan="3" id="next" class="pad">October</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="instagram">
                        <h6>instagram</h6>	
                        <ul>
                            <li><a href="#img"><img src="images/soccer/inst-img.jpg" alt="post image"></a></li>
                            <li><a href="#img"><img src="images/soccer/inst-img1.jpg" alt="post image"></a></li>
                            <li><a href="#img"><img src="images/soccer/inst-img3.jpg" alt="post image"></a></li>
                            <li><a href="#img"><img src="images/soccer/inst-img2.jpg" alt="post image"></a></li>
                        </ul>
                    </div>
                    <div class="recent-news">
                        <h6>recent news</h6>
                        <div class="item">
                            <div class="date"><a href="news-single.html">25 Sep 2016</a> in <a href="news-single.html">highlights</a></div>
                            <a href="news-single.html" class="name">When somersaulting Sanchez shoulderd Mexico’s </a>
                        </div>
                        <div class="item">
                            <div class="date"><a href="news-single.html">25 Sep 2016</a> in <a href="news-single.html">highlights</a></div>
                            <a href="news-single.html" class="name">When somersaulting Sanchez shoulderd Mexico’s </a>
                        </div>
                        <div class="item">
                            <div class="date"><a href="news-single.html">25 Sep 2016</a> in <a href="news-single.html">highlights</a></div>
                            <a href="news-single.html" class="name">When somersaulting Sanchez shoulderd Mexico’s </a>
                        </div>
                    </div>
                    <div class="sidebar-tags-wrap">
                        <h6>Tags</h6>
                        <div class="tags">
                            <a href="#links">Team</a>
                            <a href="#links">Sport</a>
                            <a href="#links">Soccer</a>
                            <a href="#links">Football</a>
                            <a href="#links">Player</a>
                        </div>
                    </div>
                </section>	

                <!--SIEDBAR END-->

                <!--NEWS SINGLE BEGIN-->

                <section class="news-single col-xs-12 col-sm-12 col-md-9">
                    <p class="hidden-md hidden-lg">
                        <button type="button" class="btn sidebar-btn" data-toggle="offcanvas" title="Toggle sidebar">sidebar</button>
                    </p>
                    <div class="item">
                        <div class="top-info">
                            <div class="date"><a href="#">25 Sep 2016</a> by <a href="#">Mason Carrington</a></div>
                            <div class="comment-quantity">3 comments</div>
                        </div>
                        <div class="img-wrap">
                            <div class="bage highlight">highlight</div>
                            <img src="images/soccer/news-list-img.jpg" alt="news-single">
                        </div>
                        <div class="post-text">
                            <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven't heard of them tumeric venmo deep v mixtape semiotics brunch.  Next level paleo taxidermy, bespoke messenger bag leggings occupy food truck. <br>Hella pop-up flexitarian, semiotics migas humblebrag schlitz literally tofu deep v thundercats skateboard viral cornhole. Lomo knausgaard truffaut selfies flexitarian, tbh swag kickstarter gastropub mustache readymade artisan keffiyeh gochujang.</p>
                            <blockquote>
                                <p>Ogi farm-to-table migas vinyl, semiotics yuccie swag ugh helvetica 8-bit. Austin mustache man bun vice helvetica.</p>
                                <p class="name">Brandon Campbell</p>
                            </blockquote>
                            <p>Fixie four dollar toast meggings, 8-bit letterpress schlitz kale chips vexillologist yr venmo blog kitsch hammock affogato. Tbh kombucha typewriter pug, cliche ramps try-hard. Salvia enamel pin quinoa twee edison bulb, affogato typewriter unicorn cray asymmetrical. Scenester bitters kinfolk, small batch green juice cliche flexitarian poutine fixie cornhole dreamcatcher. Mustache irony pickled schlitz wayfarers tattooed. Kale chips roof party activated charcoal, paleo kogi affogato coloring book direct trade. Blue bottle dreamcatcher cardigan, bicycle rights live-edge shoreditch echo park sartorial deep v heirloom narwhal mumblecore.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="tags">
                                        <a href="#">Football</a>
                                        <a href="#">Sport</a>
                                        <a href="#">Soccer</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <ul class="share-bar">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li class="google"><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="author-box">
                            <div class="top">
                                <div class="avatar"><img src="images/common/author-avatar.jpg" alt="author-avatar"></div>
                                <div class="info">
                                    <div class="name">Mason Carrington</div>
                                    <p>Pour-over ethical wolf pork belly mustache tattooed poke fashion axe scenester.</p>
                                </div>

                            </div>
                            <div class="share-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                    <div class="title">25 posts</div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 text-right">
                                                    <ul class="share-socials">
                                                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>	
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comments-wrap">
                            <h4>Comments</h4>
                            <div class="comment-item">
                                <div class="avatar"><img src="images/common/author-avatar.jpg" alt="author-avatar"></div>
                                <div class="info">
                                    <div class="date">
                                        <a href="#">25 Sep 2016</a> by <a href="#">Ian Finch</a>
                                        <a href="#" class="quote">#</a>
                                    </div>
                                    <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven't heard of them tumeric venmo deep v mixtape semiotics brunch.</p>
                                    <a href="#" class="reply">reply</a>
                                </div>
                            </div>
                            <div class="comment-item answer">
                                <div class="avatar"><img src="images/common/author-avatar.jpg" alt="author-avatar"></div>
                                <div class="info">
                                    <div class="date">
                                        <a href="#">25 Sep 2016</a> by <a href="#">Ian Finch</a>
                                        <a href="#" class="quote">#</a>
                                    </div>
                                    <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven't heard of them tumeric venmo deep v mixtape semiotics brunch.</p>
                                    <a href="#" class="reply">reply</a>
                                </div>
                            </div>
                            <div class="comment-item">
                                <div class="avatar"><img src="images/common/author-avatar.jpg" alt="author-avatar"></div>
                                <div class="info">
                                    <div class="date">
                                        <a href="#">25 Sep 2016</a> by <a href="#">Ian Finch</a>
                                        <a href="#" class="quote">#</a>
                                    </div>
                                    <p>Pabst irony tattooed, synth sriracha selvage pok pok. Wayfarers kinfolk sartorial, helvetica you probably haven't heard of them tumeric venmo deep v mixtape semiotics brunch.</p>
                                    <a href="#" class="reply">reply</a>
                                </div>
                            </div>
                            <div class="leave-comment-wrap">
                                <h4>Leave a comment</h4>	
                                <form>								
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="item">
                                                <label>
                                                    <span>Name <i>*</i></span>
                                                    <input type="text" name="name">
                                                </label>
                                            </div>	
                                        </div>
                                        <div class="col-md-6">
                                            <div class="item">
                                                <label>
                                                    <span>Email <i>*</i></span>
                                                    <input type="email" name="email">
                                                </label>
                                            </div>	
                                        </div>
                                        <div class="col-md-12">
                                            <div class="item">
                                                <label>
                                                    <span>Your comment</span>
                                                    <textarea></textarea>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="comment-submit">post a comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!--NEWS SINGLE END-->

            </div>
        </div>
    </div>

    <!--CONTENT END-->

@endsection