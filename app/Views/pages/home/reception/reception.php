<?php
\Core\View::renderHeader();?>


    <div class="colors"><div>
    <div class="content"><img src="">
        <div class="Window">Specialization
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option>-none-</option>
                        <option value="0-13"><?php
                            foreach ($dashboard as $key=>$value){
                                echo $value->name_direction;
                            }
                            ?></option>
                    </select>
                </form>
            </div>
        </div>
        <div class="Window">Operations
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option value="0-13">-none-</option>
                        <option value="0-13">Neurologist</option>
                        <option value="14-17">Dentist</option>
                        <option value="18-23">Oncologist</option>
                        <option value="24+">Podiatrist</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="Window">Doctors
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option value="0-13">-none-</option>
                        <option value="0-13">L.Simpson</option>
                        <option value="14-17">D.Harisson</option>
                        <option value="18-23">W.House</option>
                        <option value="24+">J.Kerry</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="Window">Date
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option value="0-13">-none-</option>
                        <option value="0-13">13.08.2020</option>
                        <option value="14-17">21.11.2020</option>
                        <option value="18-23">19.01.2020</option>
                        <option value="24+">27.08.2020</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="Window">Time
            <div class="timedate">
                <form>
                    <select class="miniwindow">
                        <option value="0-13">-none-</option>
                        <option value="0-13">20:13</option>
                        <option value="14-17">17:32</option>
                        <option value="18-23">12:03</option>
                        <option value="24+">18:55</option>
                    </select>
                </form>
            </div>
        </div>
    </div>


<?php \Core\View::renderFooter(); ?>