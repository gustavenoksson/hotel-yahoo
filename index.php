<?php
// Always require autoload when using packages
require(__DIR__ . '/vendor/autoload.php');
require __DIR__ . '/hotelFunctions.php';
require __DIR__ . '/header.php';
?>

<header>
          <?php require __DIR__ . '/date.php'; ?>
</header>

<main>
          <div class="history">
                    <img width="350" height="200" alt="history" src="images/historyyahoo.jpeg">
          </div>

          <p>Yahoos are legendary beings in the 1726 satirical novel Gulliver's Travels written by Jonathan Swift. Their behaviour and character representation is meant to comment on the state of Europe from Swift's point of view. The word "yahoo" was coined by Jonathan Swift in the fourth section of Gulliver's Travels and has since entered the English language more broadly. Swift describes Yahoos as filthy with unpleasant habits, "a brute in human form," resembling human beings far too closely for the liking of protagonist Lemuel Gulliver. He finds the calm and rational society of intelligent horses, the Houyhnhnms, greatly preferable.</p>
          <div class="calendar">
                    <h3>Room I January 2023</h3>
                    <img width="350" height="350" alt="room1" src="images/room1.jpeg">
                    <table cellspacing="0">
                              <tbody>
                                        <tr class="weekdays">
                                                  <th>Mon</th>
                                                  <th>Tue</th>
                                                  <th>Wed</th>
                                                  <th>Thu</th>
                                                  <th>Fri</th>
                                                  <th>Sat</th>
                                                  <th>Sun</th>
                                        </tr>
                                        <tr>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td>1</td>
                                        </tr>
                                        <tr>
                                                  <td>2</td>
                                                  <td>3</td>
                                                  <td>4</td>
                                                  <td>5</td>
                                                  <td>6</td>
                                                  <td>7</td>
                                                  <td>8</td>
                                        </tr>
                                        <tr>
                                                  <td>9</td>
                                                  <td>10</td>
                                                  <td>11</td>
                                                  <td>12</td>
                                                  <td>13</td>
                                                  <td>14</td>
                                                  <td>15</td>
                                        </tr>
                                        <tr>
                                                  <td>16</td>
                                                  <td>17</td>
                                                  <td>18</td>
                                                  <td>19</td>
                                                  <td>20</td>
                                                  <td>21</td>
                                                  <td>22</td>
                                        </tr>
                                        <tr>
                                                  <td>23</td>
                                                  <td>24</td>
                                                  <td>25</td>
                                                  <td>26</td>
                                                  <td>27</td>
                                                  <td>28</td>
                                                  <td>29</td>
                                        </tr>
                                        <tr>
                                                  <td>30</td>
                                                  <td>31</td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                        </tr>
                              </tbody>
                    </table>
          </div>
</main>

<button type="submit">
          Please make a reservation!
</button>

<?php
require __DIR__ . '/slogan.php';
?>

<script src="script.js"></script>
